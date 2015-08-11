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
        $sites = Site::orderBy('approved_at', 'desc')
            ->whereNotNull('approved_at')
            ->with('host.submissions.user')
            ->get();

        return view('welcome', compact('sites'));
    }
}
