<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observers\SubmissionObserver;

class Submission extends Model
{
    public static function boot()
    {
        parent::boot();
        Submission::observe(new SubmissionObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function host()
    {
        return $this->belongsTo(Host::class);
    }
}
