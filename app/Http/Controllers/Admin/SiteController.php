<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Host;
use App\Site;
use Cloudinary\Uploader;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $host = Host::where('name', $request->input('host'))->firstOrFail();

        return view('admin.site.create', compact('host'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $host = Host::where('name', $request->input('host'))->firstOrFail();

        $messages = [
            'url_responds' => 'The :attribute responded with a non-200 status code, please make sure it\'s a valid url.'
        ];

        $this->validate($request, [
            'url'         => ['required', 'url', 'active_url', 'unique:sites'],
            'title'       => ['required', 'unique:sites'],
            'description' => ['required'],
            'image_url'   => ['required', 'url', 'url_responds'],
            'red'         => ['required', 'numeric', 'min:0', 'max:255'],
            'green'       => ['required', 'numeric', 'min:0', 'max:255'],
            'blue'        => ['required', 'numeric', 'min:0', 'max:255'],
        ], $messages);

        $image = Uploader::upload($request->input('image_url'));
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

        return redirect()->action('Admin\SiteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $site = Site::findOrFail($id);

        return view('admin.site.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function approve(Request $request, $id)
    {
        $site = Site::whereNull('approved_at')->where('id', (int) $id)->firstOrFail();

        $site->approveBy(Auth::user())->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
