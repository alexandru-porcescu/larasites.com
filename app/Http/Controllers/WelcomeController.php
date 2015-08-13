<?php

namespace App\Http\Controllers;

use Auth;
use Cache;
use Illuminate\Http\Request;
use App\Site;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function showWelcome(Request $request)
    {
        $page = (int) $request->input('page', 1);

        $sites = Cache::rememberForever('welcome/page/'.$page, function () use ($page) {
            return Site::orderBy('approved_at', 'desc')
                ->whereNotNull('approved_at')
                ->with('user')
                ->simplePaginate($page);
        });

        return view('welcome', compact('sites'));
    }
}
