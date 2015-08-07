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
        $query = Site::latest()->with('submission.user')->take(15);

        if (!Auth::user()) {
            $query = $query->approved();
        }

        $sites = $query->get();

        return view('welcome', compact('sites'));
    }
}
