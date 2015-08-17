<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use URL;
use App\Site;
use App\Vote;
use Auth;
use App\Http\Controllers\Controller;

class VotingController extends Controller
{
    /**
     * @param Illuminate\Http\Request $request
     * @param int $id
     */
    public function submitVote(Request $request, $id)
    {
        $request->session()->put('url.previous', URL::previous());

        if (Auth::guest()) {
            $request->session()->put('url.intended', URL::current());
            return redirect('auth');
        }

        $site = Site::findOrFail((int) $id);

        $user = Auth::user();

        DB::beginTransaction();

        $vote = Vote::where('site_id', $site->id)->where('user_id', $user->id)->first();

        if ($vote) {
            $vote->delete();
        } else {
            $vote = new Vote;
            $vote->user_id = $user->id;
            $vote->site_id = $site->id;
            $vote->save();
        }

        $site->vote_count = $site->votes()->count();
        $site->save();

        DB::commit();

        $next = $request->session()->get('url.previous', '/');

        $request->session()->forget('url.previous');

        return redirect($next);
    }
}
