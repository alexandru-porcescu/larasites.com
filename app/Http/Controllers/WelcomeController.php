<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Site;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function showWelcome()
    {
        $sites = Site::orderBy('approved_at', 'desc')->whereNotNull('approved_at')->with('user')->simplePaginate();

        $unapproved = [];

        if (Auth::user() && Auth::user()->is_admin) {
            $unapproved = Site::whereNull('approved_at')->get();
        }

        return view('welcome', compact('sites', 'unapproved'));
    }
}
