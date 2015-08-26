<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Site;
use App\Http\Controllers\Controller;
use App\Pagination\PaginationPresenter;

class WelcomeController extends Controller
{
    public function showWelcome(Request $request)
    {
        $q = Site::whereNotNull('approved_at')->with('user');

        if ($request->input('order') === 'popular') {
            $q->orderBy('vote_count', 'desc');
        } else {
            $q->orderBy('approved_at', 'desc');
        }

        $sites = $q->paginate();

        $user = Auth::user();

        $paginator = new PaginationPresenter($sites);

        return view('welcome', compact('sites', 'user', 'paginator'));
    }
}
