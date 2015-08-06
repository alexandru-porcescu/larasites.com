<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function showWelcome()
    {
        $sites = Site::orderBy('created_at', 'desc')->whereNotNull('approved_at')->paginate();

        return view('welcome', compact('sites'));
    }
}
