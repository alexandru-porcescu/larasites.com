<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Site extends Model
{
    protected $dates = ['approved_at'];

    public function host()
    {
        return $this->hasOne(Host::class);
    }

    public function approveBy(User $user)
    {
        $this->approved_by = $user->id;
        $this->approved_at = Carbon::now();
        return $this;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return string
     */
    public function getRgbAttribute()
    {
        return implode(',', [
            $this->red,
            $this->green,
            $this->blue
        ]);
    }
}
