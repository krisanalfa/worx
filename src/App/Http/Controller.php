<?php

namespace App\Http;

use Slim\Slim;

use App\Traits\HasHeader;
use App\Traits\JsonResponse;

abstract class Controller
{
    use HasHeader, JsonResponse;

    protected $app;

    protected $baseRoute;

    public function __construct(Slim $app, $baseRoute)
    {
        $this->app = $app;
        $this->baseRoute = $baseRoute;
    }

    abstract public function map();
}
