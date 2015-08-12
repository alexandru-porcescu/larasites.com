<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Host;
use App\Submission;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $submissions = Submission::orderBy('created_at', 'desc')->with('user')->take(10)->get();
        $hosts = Host::orderBy('created_at', 'desc')->take(3)->get();
        $users = User::orderBy('created_at', 'desc')->take(3)->get();

        return view('admin.dashboard', compact('hosts', 'submissions', 'users'));
    }
}
