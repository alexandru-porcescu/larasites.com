<?php

namespace App\Observers;

use App\Host;
use League\Url\UrlImmutable;

class SubmissionObserver
{
    public function saving($model)
    {
        $url = UrlImmutable::createFromUrl($model->url);

        $hostUrl = $url->getHost();

        $host = Host::withTrashed()
            ->where('name', (string) $hostUrl)
            ->first();

        if (! $host) {
            $host = new Host;
            $host->name = $url->getHost();
            $host->save();
        }

        $model->host_id = $host->id;
    }
}
