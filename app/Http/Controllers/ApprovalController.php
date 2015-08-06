<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extraction;
use App\Site;
use App\Http\Controllers\Controller;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function showExtractions(Request $request)
    {
        $extractions = Extraction::orderBy('created_at', 'desc')
            ->with('submission.user')
            ->whereNull('site_id')
            ->paginate();

        return view('extractions', compact('extractions'));
    }

    public function submitApproval(Request $request)
    {
        $extraction = Extraction::findOrFail($request->input('extraction_id'));

        $color = explode(',', $request->input('color'));

        $site = new Site;
        $site->url = $request->input('url');
        $site->title = $request->input('title');
        $site->description = $request->input('description');
        $site->favicon_url = $request->input('favicon_url');
        $site->red = $color[0];
        $site->green = $color[1];
        $site->blue = $color[2];
        $site->save();

        $extraction->site_id = $site->id;
        $extraction->save();

        return redirect()->action('ApprovalController@showExtractions');
    }
}
