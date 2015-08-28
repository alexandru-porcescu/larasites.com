<?php

namespace App\Http\Controllers;

use DB;
use URL;
use Auth;
use App\Site;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{
    /**
     * @param Illuminate\Http\Request $request
     * @param int $id
     */
    public function submitVote(Request $request, $id)
    {
        if (Auth::guest()) {
            $request->session()->put('url.previous', URL::previous());
            $request->session()->put('url.intended', $request->url());
            return redirect('auth');
        }

        if (! $request->session()->has('url.previous')) {
            $request->session()->put('url.previous', URL::previous());
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

        $next = $request->session()->get('url.previous', '/') . '#site-' . $site->id;

        $request->session()->forget('url.previous');

        return redirect($next);
    }
}
