<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Submission;
use App\Jobs\ExtractSubmission;
use App\Http\Controllers\Controller;

class SubmitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showSubmitForm(Request $request)
    {
        return view('submit');
    }

    public function submitSubmitForm(Request $request)
    {
        $messages = [
            'unique' => 'That url has already been submitted.',
        ];

        $this->validate($request, [
            'url' => 'required|url|unique:submissions',
        ], $messages);

        $submission = new Submission;
        $submission->url = $request->input('url');
        $submission->user_id = Auth::user()->id;

        $submission->save();

        $this->dispatchFrom(ExtractSubmission::class, $request, [
            'submission' => $submission
        ]);

        return redirect('submit/thanks');
    }

    public function showThankyouPage()
    {
        return view('thankyou');
    }
}
