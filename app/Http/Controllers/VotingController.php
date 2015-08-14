<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Vote;
use Auth;
use App\Http\Controllers\Controller;

class VotingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submitVote(Request $request, $id)
    {
        $site = Site::findOrFail((int) $id);

        $user = Auth::user();

        $vote = Vote::where('site_id', $site->id)->where('user_id', $user->id)->first();

        if ($vote) {
            $vote->delete();
        } else {
            $vote = new Vote;
            $vote->user_id = $user->id;
            $vote->site_id = $site->id;
            $vote->save();
        }

        // TODO: What if the site a user voted for was on page 2 or 3...
        return redirect('/');
    }
}
