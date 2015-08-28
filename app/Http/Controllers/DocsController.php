<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    /**
     * @return View
     */
    public function showTermsOfService()
    {
        return view('terms-of-service');
    }

    /**
     * @return View
     */
    public function showPrivacyPolicy()
    {
        return view('privacy-policy');
    }

    /**
     * @return View
     */
    public function showContributorsGuide()
    {
        return view('contributors-guide');
    }
}
