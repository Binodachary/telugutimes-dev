<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @method where(string $getRouteKeyName, mixed $value)
 * @method static whereSlug(string $slug)
 * @method static whereDate(string $string, \Carbon\Carbon $today)
 */
class Gallery extends Model
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        if(!request()->routeIs('admin.*.*')) {
            static::addGlobalScope('active', function (Builder $builder) {
                $builder->where('is_active', true);
            });
        }
        static::addGlobalScope('fresh', function (Builder $builder) {
            $builder->latest('id');
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
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
}
