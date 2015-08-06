<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['approved_at'];

    public function scopeApproved($q)
    {
        return $q->whereNotNull('approved_at');
    }

    public function scopeLatest($q)
    {
        return $q->orderBy('approved_at', 'desc');
    }
}
