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
            ->where('featured', true)
            ->whereNotNull('approved_at')
            ->paginate();

        $paginator = new PaginationPresenter($sites);

        $user = Auth::user();

        return view('welcome', compact('sites', 'user', 'paginator'));
    }

    public function showLatest(Request $request)
    {
        $sites = Site::with('user')
            ->orderBy('approved_at', 'desc')
            ->whereNotNull('approved_at')
            ->paginate();

        $paginator = new PaginationPresenter($sites);

        $user = Auth::user();

        return view('welcome', compact('sites', 'user', 'paginator'));
    }

    public function showPopular(Request $request)
    {
        $sites = Site::with('user')
            ->orderBy('vote_count', 'desc')
            ->whereNotNull('approved_at')
            ->paginate();

        $paginator = new PaginationPresenter($sites);

        $user = Auth::user();

        return view('welcome', compact('sites', 'user', 'paginator'));
    }
}
