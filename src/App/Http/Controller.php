<?php

namespace App\Http;

use Slim\Slim;

abstract class Controller
{
    protected $app;

    protected $baseRoute;

    public function __construct(Slim $app, $baseRoute)
    {
        $this->app = $app;
        $this->baseRoute = $baseRoute;
    }

    abstract public function map();
}
