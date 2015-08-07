<?php

namespace App\Http\Controllers;

use App\Site;
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
        $submission = Submission::where('id', (int) $request->input('submission'))
            ->has('extraction')
            ->with('user', 'extraction')
            ->firstOrFail();

        return view('add-site', compact('submission'));
    }

    public function submitCreateForm(Request $request)
    {
        $site = new Site;
        $site->submission_id = (int) $request->input('submission_id');
        $site->url = $request->input('url');
        $site->title = $request->input('title');
        $site->description = $request->input('description');
        $site->save();
        return redirect('/');
    }
}
