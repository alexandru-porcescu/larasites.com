<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Host extends Model
{
    use SoftDeletes;

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
