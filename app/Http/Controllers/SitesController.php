<?php

namespace App\Http\Controllers;

use Auth;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagination\PaginationPresenter;
use Illuminate\Pagination\LengthAwarePaginator;

class SitesController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function showFeatured(Request $request)
    {
        $sites = Site::with('user', 'builder')
            ->whereNotNull('featured_at')
            ->orderBy('featured_at', 'desc')
            ->whereNotNull('approved_at')
            ->paginate();

        return $this->render($sites);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function showLatest(Request $request)
    {
        $sites = Site::with('user', 'builder')
            ->orderBy('approved_at', 'desc')
            ->whereNotNull('approved_at')
            ->paginate();

        return $this->render($sites);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function showPopular(Request $request)
    {
        $sites = Site::with('user', 'builder')
            ->orderBy('vote_count', 'desc')
            ->whereNotNull('approved_at')
            ->paginate();

        return $this->render($sites);
    }

    /**
     * @param LengthAwarePaginator $sites
     * @return View
     */
    protected function render(LengthAwarePaginator $sites)
    {
        $paginator = new PaginationPresenter($sites);

        $user = Auth::user();

        if ($user) {
            $userVotes = $user->votes()->lists('site_id')->all();
        } else {
            $userVotes = [];
        }

        return view('sites.index', compact(
            'sites',
            'user',
            'paginator',
            'userVotes'
        ));
    }
}
