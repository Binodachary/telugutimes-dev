<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed email
 */
class Subscriber extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope('mandatory', function (Builder $builder) {
            $builder->latest('id');
        });
    }
}
