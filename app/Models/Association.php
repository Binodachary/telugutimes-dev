<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method where(string $getRouteKeyName, mixed $value)
 * @method static paginate(int $int)
 * @method static withoutGlobalScope(string $string)
 * @method static whereDate(string $string, \Carbon\Carbon $today)
 */
class Association extends Model
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
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function resolveRouteBinding($value, $field = null): ?Model
    {
        return $this->where($this->getRouteKeyName(), $value)->orWhere($this->primaryKey, $value)->first();
    }
}
