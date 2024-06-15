<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Staudenmeir\EloquentJsonRelations\Relations\HasManyJson;

/**
 * @method static whereName($heading)
 * @method static whereSlug(string $key)
 * @method static where(string $string, bool $true)
 * @method static whereIn(string $string, string[] $mainCategories)
 * @property mixed id
 * @property mixed parent_id
 */
class Category extends Model
{
    use HasFactory,HasJsonRelationships;
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        if(!request()->routeIs('admin.category.*')) {
            static::addGlobalScope('non_mandatory', function (Builder $builder) {
                $builder->where('is_active',true);
            });
        }
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeChildrenOf($query, $parent)
    {
        $query->where('parent_id', $parent);
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function resolveRouteBinding($value, $field = null): ?Model
    {
        return $this->where($this->getRouteKeyName(), $value)->orWhere($this->primaryKey, $value)->first();
    }

    /*public function news(): HasManyJson
    {
        return $this->hasManyJson(News::class,'category_json');
    }*/
}
