<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Host;
use App\Submission;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $submissions = Submission::take(3)->get();
        $hosts = Host::take(3)->get();
        $users = User::orderBy('created_at', 'desc')->take(3)->get();

        return view('admin.dashboard', compact('hosts', 'submissions', 'users'));
    }
}
