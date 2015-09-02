<?php

namespace App\Observers;

use App\Host;
use League\Url\UrlImmutable;

class SubmissionObserver
{
    public function saving($model)
    {
        $url = UrlImmutable::createFromUrl($model->url);

        $host = Host::withTrashed()
            ->where('name', (string) $url->getHost())
            ->first();

        if (! $host) {
            $host = new Host;
            $host->name = $url->getHost();
            $host->save();
        }

        $model->host_id = $host->id;
    }
}
