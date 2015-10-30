<?php

namespace App\Contracts;

interface UserContract
{
    public function all();
    public function find($id);
    public function removePassword($id);
    public function removeEmail($id);
}
