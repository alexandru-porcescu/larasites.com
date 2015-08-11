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
        $q = Site::orderBy('approved_at', 'desc')->with('user');

        if (!Auth::user() || !Auth::user()->is_admin) {
            $q = $q->whereNotNull('approved_at');
        }

        $sites = $q->simplePaginate(5);

        return view('welcome', compact('sites'));
    }
}
