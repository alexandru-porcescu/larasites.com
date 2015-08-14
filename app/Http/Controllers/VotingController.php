<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use Auth;
use App\Http\Controllers\Controller;

class VotingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submitVote(Request $request)
    {
        $id = (int) $request->input('site');

        $site = Site::findOrFail($id);

        $vote = Auth::user()->voteFor($site);

        return redirect()->back();
    }
}
