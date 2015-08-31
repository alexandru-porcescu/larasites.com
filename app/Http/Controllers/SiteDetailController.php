<?php

namespace App\Http\Controllers;

use Auth;
use App\Site;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteDetailController extends Controller
{
    public function show(Request $request, $slug)
    {
        $site = Site::where('slug', $slug)->firstOrFail();

        $user = Auth::user();

        if ($user) {
            $userVotes = $user->votes()->lists('site_id')->all();
        } else {
            $userVotes = [];
        }

        return view('sites.detail', [
            'user'      => $user,
            'userVotes' => $userVotes,
            'site'      => $site
        ]);
    }
}
