<?php

require dirname(__DIR__).'/vendor/autoload.php';

$app = new Slim\Slim([
    'debug' => true,
    'templates.path' => dirname(__DIR__).'/templates'
]);

// Register services
foreach ([
    App\Service\Ioc::class,
    App\Service\Db::class,
    App\Service\ErrorHandler::class,
] as $service) {
    with(new $service($app))->register();
}

// Register middlewares
foreach ([
    App\Middleware\ControllerMiddleware::class
] as $middleware) {
    $app->add(new $middleware());
}

// Run application
$app->run();
