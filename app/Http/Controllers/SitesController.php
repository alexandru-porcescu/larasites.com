<?php

namespace App\Http\Controllers;

use App\Site;
use App\Host;
use App\Submission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function showCreateForm(Request $request)
    {
        if (! $request->input('host')) {
            abort(404);
        }

        $host = Host::where('name', $request->input('host'))
            ->has('site', 0)
            ->with('submissions.user')
            ->firstOrFail();

        return view('add-site', compact('host'));
    }

    public function submitCreateForm(Request $request)
    {
        $host = Host::where('name', $request->input('host'))->firstOrFail();

        $site = new Site;
        $site->url = $request->input('url');
        $site->title = $request->input('title');
        $site->description = $request->input('description');
        $site->save();

        $host->site_id = $site->id;
        $host->save();

        return redirect('/');
    }
}
