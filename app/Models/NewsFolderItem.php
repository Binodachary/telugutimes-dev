<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static withoutGlobalScope(string $string)
 */
class NewsFolderItem extends Model
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

    public function gallery(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Gallery::class,'id','gallery_id');
    }
}
