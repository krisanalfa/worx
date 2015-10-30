<?php

namespace App\Http;

class SiteController extends Controller
{
    public function map()
    {
        $app = $this->app;

        $app->get($this->baseRoute, [$this, 'index']);
    }

    public function index()
    {
        $app = $this->app;

        $app->render('site/index.php');
    }
}
