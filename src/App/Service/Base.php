<?php

namespace App\Service;

use Slim\Slim;

abstract class Base
{
    protected $app;

    public function __construct(Slim $app)
    {
        $this->app = $app;
    }

    abstract public function register();
}
