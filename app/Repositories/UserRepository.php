<?php

namespace App\Repositories;


use App\User;

class UserRepository
{
    public function find($id)
    {
        return User::find($id);
    }
}
