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
        //
    }
}
