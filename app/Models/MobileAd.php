<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 */
class MobileAd extends Model
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
            $builder->orderBy('sort_order');
        });

        if(!request()->routeIs('admin.mobileAd.*')) {
            static::addGlobalScope('non_mandatory', function (Builder $builder) {
                $builder->where('is_active',true);
            });
        }
    }
}
