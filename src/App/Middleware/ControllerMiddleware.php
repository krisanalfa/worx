<?php

namespace App\Middleware;

use Slim\Middleware;

class ControllerMiddleware extends Middleware
{
    public function call()
    {
        // The Slim application
        $app = $this->app;

        // The Environment object
        $environment = $app->environment;

        // The Request object
        $request = $app->request;

        // The Response object
        $response = $app->response;

        // Route Configuration
        $routeConfig = [
            '/api/user' => \App\Http\ApiUserController::class,
            '/api' => \App\Http\ApiSiteController::class,
            '/' => \App\Http\SiteController::class,
        ];

        // Request path info
        $pathInfo = $request->getPathInfo();

        // Searching per directory
        foreach ($routeConfig as $basePath => $controller) {
            if ($pathInfo === $basePath) {
                with(new $controller($app, $basePath))->map();

                break;
            }

            if (starts_with(ltrim($pathInfo, '/'), ltrim($basePath, '/'))) {
                with(new $controller($app, $basePath))->map();

                break;
            }
        }

        // Call next middleware
        $this->next->call();
    }
}
