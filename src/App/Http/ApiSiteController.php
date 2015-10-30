<?php

namespace App\Http;

class ApiSiteController extends Controller
{
    public function map()
    {
        $app = $this->app;

        $app->get($this->baseRoute, [$this, 'index']);
    }

    public function index()
    {
        $app = $this->app;

        $app->response->headers->set('Content-Type', 'application/json');

        $app->response->write(json_encode([
            'status' => 200,
            'message' => 'Ok',
        ]));
    }
}
