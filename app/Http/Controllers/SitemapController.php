<?php

namespace App\Http\Controllers;

use Response;
use App\Site;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $routes = [
            action('SitesController@showFeatured'),
            action('SitesController@showLatest'),
            action('SitesController@showPopular'),
            action('DocsController@showTermsOfService'),
            action('DocsController@showPrivacyPolicy'),
            action('DocsController@showContributorsGuide'),
        ];

        $sites = Site::whereNotNull('approved_at')->whereNotNull('slug')->get();

        foreach ($sites as $site) {
            $routes[] = action('SiteDetailController@show', [$site->slug]);
        }

        return Response::view('sitemap/index', ['routes' => $routes])
            ->header('Content-Type', 'application/xml');
    }
}
