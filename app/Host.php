<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Host extends Model
{
    use SoftDeletes;

    protected $hidden = ['deleted_at'];

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * The Host URL is used purely as a suggestion a Site canonical URL.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return 'http://' . $this->name;
    }
}
