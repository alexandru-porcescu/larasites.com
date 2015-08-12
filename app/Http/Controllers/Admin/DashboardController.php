<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Site;
use App\User;
use App\Host;
use App\Submission;

class DashboardController extends Controller
{
    public function index()
    {
        $sites = Site::whereNull('approved_at')->get();

        $submissions = Submission::orderBy('created_at', 'desc')
            ->with('user')
            ->has('host')
            ->take(10)
            ->get();

        $hosts = Host::orderBy('created_at', 'desc')->take(3)->has('site', 0)->get();

        $users = User::orderBy('created_at', 'desc')->take(3)->get();

        return view('admin.dashboard', compact('sites', 'hosts', 'submissions', 'users'));
    }
}
