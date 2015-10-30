<?php

namespace App\Service;

use Illuminate\Events\Dispatcher;
use Illuminate\Database\Capsule\Manager as Capsule;

class Db extends Base
{
    public function register()
    {
        $app = $this->app;

        $app->container->singleton('db', function () use ($app) {
            $capsule = new Capsule($app->ioc);

            $capsule->addConnection(array(
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'worx',
                'username'  => 'root',
                'password'  => 'devspartan',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ));

            // Set the event dispatcher used by Eloquent models... (optional)
            $capsule->setEventDispatcher(new Dispatcher($app->ioc));

            // Make this Capsule instance available globally via static methods... (optional)
            $capsule->setAsGlobal();

            // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
            $capsule->bootEloquent();

            return $capsule;
        });

        $app->ioc->bind('db', function () use ($app) {
            return $app->db;
        });
    }
}
