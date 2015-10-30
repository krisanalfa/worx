<?php

namespace App\Traits;

trait HasHeader
{
    protected function prepareHeader()
    {
        $app = $this->app;

        $this->app->response->headers->set('Content-Type', 'application/json');
        $this->app->response->headers->set('Author', 'Anu');
        $this->app->response->headers->set('Cache-Validate', '3600');
    }
}
