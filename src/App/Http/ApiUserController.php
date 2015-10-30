<?php

namespace App\Http;

class ApiUserController extends Controller
{
    public function map()
    {
        $app = $this->app;

        $app->get($this->baseRoute, [$this, 'index']);
        $app->get($this->baseRoute.'/:id', [$this, 'find']);
    }

    public function index()
    {
        $app = $this->app;

        $app->response->headers->set('Content-Type', 'application/json');

        $app->response->write(json_encode((array) $app->db->table('user')->get()));
    }

    public function find($id)
    {
        $app = $this->app;

        $app->response->headers->set('Content-Type', 'application/json');

        if ($user = $app->db->table('user')->where('id', '=', $id)->first()) {

            return $app->response->write(json_encode((array) $user));
        }

        return $app->notFound();
    }
}
