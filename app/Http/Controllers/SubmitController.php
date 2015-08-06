<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Submission;
use Validator;
use App\Jobs\ExtractSubmission;
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
        $url = parse_url($request->input('url'));

        $input = [
            'url' => base_url($request->input('url')),
            'scheme' => $url['scheme'],
        ];

        $validator = Validator::make($input, [
            'url' => 'required|url|unique:submissions|unique:extractions',
            'scheme' => 'in:http,https',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $submission = new Submission;
        $submission->url = $input['url'];
        $submission->original_url = $request->input('url');
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
