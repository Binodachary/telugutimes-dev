<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeNote extends Model
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
        if (!request()->routeIs('admin.welcome.*')) {
            static::addGlobalScope('non_mandatory', function (Builder $builder) {
                $builder->where('is_active', true)->where(function ($query) {
                    $query->whereDate('schedule_to', \Carbon\Carbon::now())
                        ->whereTime('schedule_to','<=',\Carbon\Carbon::now());
                });
            });
        }
    }
}
