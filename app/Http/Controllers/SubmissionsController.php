<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Submission;

class SubmissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function showSubmissions(Request $request)
    {
        $submissions = Submission::orderBy('created_at', 'desc')->with('user')->paginate();

        return view('submissions', compact('submissions'));
    }
}
