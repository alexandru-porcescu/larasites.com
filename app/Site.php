<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $dates = ['approved_at'];

    public function host()
    {
        return $this->belongsTo(Host::class);
    }
}
