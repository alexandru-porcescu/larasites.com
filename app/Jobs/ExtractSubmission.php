<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Submission;
use App\Extraction;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Client;

class ExtractSubmission extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $submission;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new Client;

        $response = $client->get('http://api.embed.ly/1/extract', [
            'query' => [
                'url' => $this->submission->url,
                'key' => config('services.embedly.key')
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            $extraction = new Extraction;
            $extraction->submission_id = $this->submission->id;
            $extraction->data = $response->getBody();
            $extraction->save();
        }
    }
}
