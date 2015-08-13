<?php

namespace App\Exceptions;

use Auth;
use Raven_Client;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        NotFoundHttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        if ($this->shouldReport($e)) {
            $client = new Raven_Client(config('services.sentry.dsn'), [
                'curl_method' => 'async'
            ]);

            $client->tags_context(['environment' => app()->environment()]);

            $client->extra_context(['laravel' => '5.1']);

            if (Auth::user()) {
                $client->user_context(['id' => Auth::user()->id]);
            }

            try {
                $client->captureException($e);
            } catch (\Exception $e) {
                // EXCEPTIONCEPTION
            }
        }

        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        return parent::render($request, $e);
    }
}
