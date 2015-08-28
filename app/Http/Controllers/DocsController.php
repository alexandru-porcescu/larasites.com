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
        return view('docs.terms-of-service');
    }

    /**
     * @return View
     */
    public function showPrivacyPolicy()
    {
        return view('docs.privacy-policy');
    }

    /**
     * @return View
     */
    public function showContributorsGuide()
    {
        return view('docs.contributors-guide');
    }
}
