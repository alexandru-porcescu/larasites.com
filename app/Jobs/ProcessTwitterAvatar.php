<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessTwitterAvatar extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;

        if ($user->avatar_url) {
            return;
        }

        if ($user->twitter_avatar_original) {
            $response = \Cloudinary\Uploader::upload($user->twitter_avatar_original);
            $user->cloudinary_public_id = $response['public_id'];
            $user->cloudinary_url = $response['url'];
            $user->cloudinary_secure_url = $response['secure_url'];
            $user->save();
        }
    }
}
