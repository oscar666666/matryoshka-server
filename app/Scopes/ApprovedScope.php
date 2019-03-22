<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use TCG\Voyager\Models\Role;

class ApprovedScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin()) return;

            $builder
                ->where('creator_id', Auth::user()->id)
                ->orWhere('approved', true);
        } else {
            $builder
                ->where('approved', true);
        }
    }
}
