<?php

namespace App\Factories;

use Slim\Slim;
use App\Contracts\UserContract;

class User extends Base implements UserContract
{
    public function all()
    {
        return Slim::getInstance()
            ->db
            ->table('user')
            ->get();
    }

    public function find($id)
    {
        return Slim::getInstance()
            ->db
            ->table('user')
            ->where('id', '=', $id)
            ->first();
    }

    public function removePassword($id)
    {
        if ($user = $this->find($id)) {
            $user = (array) $user;
            unset($user['password']);

            return $user;
        }
    }

    public function removeEmail($id)
    {
        if ($user = $this->find($id)) {
            $user = (array) $user;
            unset($user['email']);

            return $user;
        }
    }
}
