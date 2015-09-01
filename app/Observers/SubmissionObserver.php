<?php

namespace App\Observers;

use App\Host;

class SubmissionObserver
{

    public function saving($model)
    {
    }

    public function saved($model)
    {
        // dd($model->url);
        $host = Host::withTrashed()
        ->where('name', (string) $url->getHost())
        ->first();

        if (! $host) {
            $host = new Host;
            $host->name = $model->url->getHost();
            $host->save();
        }
    }
}
