<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Submission;
use App\Host;
use Validator;
use League\Url\UrlImmutable;
use App\Http\Controllers\Controller;
use App\Observers\SubmissionObserver;

class SubmitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showThanks']]);
    }

    public function showSubmitForm(Request $request)
    {
        return view('submit');
    }

    public function submitSubmitForm(Request $request)
    {
        $url = UrlImmutable::createFromUrl($request->input('url'));

        $input = [
            'url'      => (string) $url,
            'protocol' => (string) $url->getScheme(),
        ];

        $validator = Validator::make($input, [
            'url'      => 'required|url|unique:submissions,url,NULL,id,user_id,'.Auth::user()->id,
            'protocol' => 'in:http,https',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $submission = new Submission;
        $submission->url = (string) $url;
        $submission->user_id = Auth::user()->id;
        $submission->save();

        return redirect()->action('SubmitController@showThanks');
    }

    public function showThanks()
    {
        return view('thankyou');
    }
}
