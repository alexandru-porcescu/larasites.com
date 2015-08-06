<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extraction extends Model
{
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
