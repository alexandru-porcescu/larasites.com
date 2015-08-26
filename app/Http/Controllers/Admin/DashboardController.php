<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vote;
use App\Site;
use App\User;
use App\Host;
use App\Submission;

class DashboardController extends Controller
{
    public function index()
    {
        $sites = Site::whereNull('approved_at')->with('creator')->get();

        $submissions = Submission::orderBy('created_at', 'desc')
            ->with('user')
            ->has('host.site', 0)
            ->take(10)
            ->get();

        $hosts = Host::orderBy('created_at', 'desc')->take(3)->has('site', 0)->get();

        $users = User::orderBy('created_at', 'desc')->take(3)->get();

        $votes = Vote::orderBy('created_at', 'desc')->with('user', 'site')->take(3)->get();

        $userCount = User::count();

        $submissionCount = Submission::count();

        $heartCount = Vote::count();

        return view('admin.dashboard', compact(
            'submissionCount',
            'heartCount',
            'userCount',
            'sites',
            'hosts',
            'submissions',
            'users',
            'votes'
        ));
    }
}
