<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extraction extends Model
{
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function getBodyAttribute($value)
    {
        return json_decode($value, true);
    }
}
