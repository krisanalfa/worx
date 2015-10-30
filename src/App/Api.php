<?php

namespace App;

use App\Contracts\UserContract;

class Api
{
    protected $user;

    public function __construct(UserContract $user)
    {
        // Dependency Injection
        $this->user = $user;

        // Safe!!
        // $this->user->all();
        // $this->user->find();
    }

    public function getAllUsers()
    {
        return $this->user->all();
    }

    public function getUser($id)
    {
        if ($user = $this->user->find($id)) {
            $user = (array) $user;

            unset($user['password']);

            return $user;
        }
    }
}
