<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function showTermsOfService()
    {
        return view('terms-of-service');
    }

    public function showPrivacyPolicy()
    {
        return view('privacy-policy');
    }

    public function showContributorsGuide()
    {
        return view('contributors-guide');
    }
}
