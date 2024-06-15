<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @method static highlighted()
 * @method static whereIn(string $string, $key)
 * @method static withoutGlobalScope(string $string)
 * @method static whereSlug($param)
 * @method static whereJsonContains(string $string, $id)
 * @method static where(\Closure $param)
 * @method static whereDate(string $string, Carbon $today)
 */
class News extends Model
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('mandatory', function (Builder $builder) {
            $builder->latest('id');
        });
        if(!in_array(request()->route()->getName(),['archived','news-folder-items','news-article','api-news-folder'])) {
            static::addGlobalScope('archived', function (Builder $builder) {
                $builder->where('archived', false);
            });
        }
        if (!request()->routeIs('admin.*.*')) {
            static::addGlobalScope('non_mandatory', function (Builder $builder) {
                $builder->where('is_active', true)->where(function ($query) {
                    $query->where('schedule_to', '<=', \Carbon\Carbon::now())
                        ->orWhereNull('schedule_to');
                });
            });
        }
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeHighlighted($query)
    {
        $query->whereIsHighlighted(true);
    }

    public function resolveRouteBinding($value, $field = null): ?Model
    {
        return $this->where($this->getRouteKeyName(), $value)->orWhere($this->primaryKey, $value)->first();
    }

    public function incrementSlug($slug): string
    {
        $original = $slug;
        $count = 2;
        while (static::whereSlug($slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }
        return $slug;
    }

    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }
        $this->attributes['slug'] = $slug;
    }

    public function gallery(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Gallery::class, 'id', 'gallery_id');
    }
}
