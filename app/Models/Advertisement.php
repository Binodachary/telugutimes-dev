<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 * @method static where(string $string, string $string1)
 */
class Advertisement extends Model
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

        if(!request()->routeIs('admin.ad.*')) {
            static::addGlobalScope('non_mandatory', function (Builder $builder) {
                $builder->where('is_active',true)
                    ->where('start_date', '<=', Carbon::now()->toDateString())
                    ->where('end_date', '>=', Carbon::now()->toDateString());
            });
        }
    }
}
