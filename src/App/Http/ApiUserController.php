<?php

namespace App\Http;

use App\Factories\User;
use App\Api;

class ApiUserController extends Controller
{
    public function map()
    {
        $app = $this->app;

        $this->api = new Api(new User());

        $app->get($this->baseRoute, [$this, 'index']);
        $app->get($this->baseRoute.'/:id', [$this, 'find']);
    }

    public function index()
    {
        $this->prepareHeader();

        $this->sendBody($this->api->getAllUsers());
    }

    public function find($id)
    {
        $app = $this->app;

        $this->prepareHeader();

        if ($user = $this->api->getUser($id)) {
            return $app->response->write(json_encode((array) $user));
        }

        return $app->notFound();
    }
}
