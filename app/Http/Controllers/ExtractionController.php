<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extraction;
use App\Site;
use App\Http\Controllers\Controller;

class ExtractionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function showExtractions(Request $request)
    {
        return Extraction::paginate();
    }

    public function submitExtraction(Request $request)
    {
        //
    }
}
