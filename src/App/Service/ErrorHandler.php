<?php

namespace App\Service;

use Exception;
use Illuminate\Container\Container;

class ErrorHandler extends Base
{
    public function register()
    {
        $app = $this->app;

        $app->notFound(function () use ($app) {
            $app->response->headers->set('Content-Type', 'application/json');

            echo $app->response->write(json_encode([
                'message' => 'Not found',
            ]));
        });

        $app->error(function (Exception $error) use ($app) {
            $app->response->headers->set('Content-Type', 'application/json');

            $app->response->write(json_encode([
                'message' => 'Something bad happen.',
            ]));
        });
    }
}
