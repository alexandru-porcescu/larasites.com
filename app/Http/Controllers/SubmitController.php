<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Submission;
use Validator;
use App\Jobs\ExtractSubmission;
use League\Url\UrlImmutable;
use App\Http\Controllers\Controller;

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
            'host'     => (string) $url->getHost(),
            'protocol' => (string) $url->getScheme(),
        ];

        $messages = [
            'url.url'      => 'That doesn\'t appear to be a valid url.',
            'url.required' => 'Whoops! You need to type something in first.',
            'host.unique'  => 'A url with that hostname has already been submitted.',
            'protocol.in'  => 'The url protocol is not supported, please use http or https.'
        ];

        $validator = Validator::make($input, [
            'url'      => 'required|url',
            'host'     => 'unique:submissions',
            'protocol' => 'in:http,https',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $submission = new Submission;
        $submission->url = (string) $url;
        $submission->host = (string) $url->getHost();
        $submission->user_id = Auth::user()->id;
        $submission->save();

        $this->dispatchFrom(ExtractSubmission::class, $request, [
            'submission' => $submission
        ]);

        return redirect('submit/thanks');
    }

    public function showThanks()
    {
        return view('thankyou');
    }
}
