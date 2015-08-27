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
        $amount = 3;

        $sites = Site::whereNull('approved_at')->with('creator')->get();

        $submissions = Submission::orderBy('created_at', 'desc')
            ->with('user')
            ->has('host.site', 0)
            ->take($amount)
            ->get();

        $hosts = Host::orderBy('created_at', 'desc')->take($amount)->has('site', 0)->get();

        $users = User::orderBy('created_at', 'desc')->take($amount)->get();

        $votes = Vote::orderBy('created_at', 'desc')->with('user', 'site')->take($amount)->get();

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
