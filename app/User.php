<?php

namespace App;

use App\Site;
use App\Vote;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['is_admin'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['authenticated_at'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    /**
     * @param App\Site $site
     * @return mixed App\Vote|void
     */
    public function voteFor(Site $site)
    {
        if (!$this->hasVotedFor($site)) {
            $vote = new Vote;
            $vote->user_id = $this->id;
            $vote->site_id = $site->id;
            $vote->save();
            return $vote;
        }
    }

    /**
     * @param App\Site $site
     * @return bool
     */
    public function hasVotedFor(Site $site)
    {
        $count = Vote::where('user_id', $this->id)
            ->where('site_id', $site->id)
            ->count();

        return $count > 0;
    }
}
