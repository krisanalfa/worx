<?php

namespace App\Service;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;

class Ioc extends Base
{
    public function register()
    {
        $this->app->container->singleton('ioc', function () {
            return new Container();
        });

        Facade::setFacadeApplication($this->app->ioc);
    }
}
