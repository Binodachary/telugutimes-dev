<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static withoutGlobalScope(string $string)
 */
class Video extends Model
{
    use HasFactory;
    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('is_active', true);
        });
        static::addGlobalScope('fresh', function (Builder $builder) {
            $builder->latest('id');
        });
    }
}
