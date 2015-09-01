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

        $messages = [
            'url.url'      => 'That doesn\'t appear to be a valid url.',
            'url.required' => 'Whoops! You need to type something in first.',
            'url.unique'   => 'You have already submitted that url.',
            'protocol.in'  => 'The url protocol is not supported, please use http or https.'
        ];

        $validator = Validator::make($input, [
            'url'      => 'required|url|unique:submissions,url,NULL,id,user_id,'.Auth::user()->id,
            'protocol' => 'in:http,https',
        ], $messages);

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
