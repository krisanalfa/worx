<?php

namespace App\Http;

use App\Api;
use App\Factories\User;

class ApiSiteController extends Controller
{
    protected $api;

    public function map()
    {
        $app = $this->app;

        $this->api = new Api(new User());

        $app->get($this->baseRoute, [$this, 'index']);
        $app->get($this->baseRoute.'/admin', [$this, 'admin']);
    }

    public function index()
    {
        $this->prepareHeader();

        $this->sendBody([
            'status' => 200,
            'message' => 'Ok',
        ]);
    }

    public function admin()
    {
        $app = $this->app;

        // Design by interface
        $userDb = new User;

        $this->prepareHeader();

        if ($user = $userDb->removeEmail(1)) {
            return $app->response->write(json_encode((array) $user));
        }

        return $app->notFound();
    }
}
