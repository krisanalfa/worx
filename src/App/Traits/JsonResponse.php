<?php

namespace App\Traits;

trait JsonResponse
{
    protected function sendBody($data)
    {
        $this->app->response->write(json_encode($data));
    }
}
