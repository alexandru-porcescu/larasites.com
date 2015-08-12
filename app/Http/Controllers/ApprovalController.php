<?php

namespace App\Http\Controllers;

use Auth;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function submitApproval(Request $request)
    {
        $site = Site::whereNull('approved_at')->where('id', (int) $request->input('site_id'))->firstOrFail();

        $site->approveBy(Auth::user())->save();

        return redirect()->back();
    }
}
