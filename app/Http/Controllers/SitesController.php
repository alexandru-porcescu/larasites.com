<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Site;
use App\Http\Controllers\Controller;
use App\Pagination\PaginationPresenter;

class SitesController extends Controller
{
    public function showFeatured(Request $request)
    {
        $sites = Site::with('user')
            ->whereNotNull('featured_at')
            ->orderBy('featured_at', 'desc')
            ->whereNotNull('approved_at')
            ->paginate();

        $paginator = new PaginationPresenter($sites);

        $user = Auth::user();

        if ($user) {
            $userVotes = $user->votes()->lists('site_id')->all();
        } else {
            $userVotes = [];
        }

        return view('sites', compact('sites', 'user', 'paginator', 'userVotes'));
    }

    public function showLatest(Request $request)
    {
        $sites = Site::with('user')
            ->orderBy('approved_at', 'desc')
            ->whereNotNull('approved_at')
            ->paginate();

        $paginator = new PaginationPresenter($sites);

        $user = Auth::user();

        if ($user) {
            $userVotes = $user->votes()->lists('site_id')->all();
        } else {
            $userVotes = [];
        }

        return view('sites', compact('sites', 'user', 'paginator', 'userVotes'));
    }

    public function showPopular(Request $request)
    {
        $sites = Site::with('user')
            ->orderBy('vote_count', 'desc')
            ->whereNotNull('approved_at')
            ->paginate();

        $paginator = new PaginationPresenter($sites);

        $user = Auth::user();

        if ($user) {
            $userVotes = $user->votes()->lists('site_id')->all();
        } else {
            $userVotes = [];
        }

        return view('sites', compact('sites', 'user', 'paginator', 'userVotes'));
    }
}
