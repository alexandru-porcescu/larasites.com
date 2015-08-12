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

        $this->validate($request, [
            'url'         => ['required', 'url', 'active_url'],
            'title'       => ['required'],
            'description' => ['required'],
            'image_url'   => ['required', 'url', 'url_responds'],
            'red'         => ['required', 'numeric', 'min:0', 'max:255'],
            'green'       => ['required', 'numeric', 'min:0', 'max:255'],
            'blue'        => ['required', 'numeric', 'min:0', 'max:255'],
        ], [
            'url_responds' => 'The :attribute responded with a non-200 status code, please make sure it\'s a valid url.'
        ]);

        $image = \Cloudinary\Uploader::upload($request->input('image_url'));

        $site = new Site;
        $site->url = $request->input('url');
        $site->title = $request->input('title');
        $site->description = $request->input('description');
        $site->red = (int) $request->input('red');
        $site->green = (int) $request->input('green');
        $site->blue = (int) $request->input('blue');
        $site->user_id = $host->submissions->first()->user->id;
        $site->image_url = $image['secure_url'];
        $site->save();

        $host->site_id = $site->id;
        $host->save();

        return redirect('/');
    }
}
