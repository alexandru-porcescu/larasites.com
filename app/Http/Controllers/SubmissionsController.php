<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Host;

class SubmissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function showSubmissions(Request $request)
    {
        $hosts = Host::orderBy('updated_at', 'desc')->with('submissions.user')->get();

        return view('submissions', compact('hosts'));
    }
}
