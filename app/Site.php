<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Color;
use Carbon\Carbon;
use League\Url\UrlImmutable;

class Site extends Model
{
    protected $dates = ['approved_at', 'featured_at'];

    public function host()
    {
        return $this->hasOne(Host::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function approveBy(User $user)
    {
        $this->approved_by = $user->id;
        $this->approved_at = Carbon::now();
        return $this;
    }

    public function unapprove()
    {
        $this->approved_by = null;
        $this->approved_at = null;
        return $this;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function featurer()
    {
        return $this->belongsTo(User::class, 'featured_by');
    }

    public function getColorAttribute()
    {
        $rgb = [$this->red, $this->green, $this->blue];

        $vibe = Color::rgbToHex($rgb);

        return new Color($vibe);
    }

    public function featureBy(User $user)
    {
        $this->featured_by = $user->id;
        $this->featured_at = Carbon::now();
        return $this;
    }

    public function unfeature()
    {
        $this->featured_by = null;
        $this->featured_at = null;
        return $this;
    }
}
