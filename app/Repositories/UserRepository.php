<?php

namespace App\Repositories;

use App\Interfaces\IUserRepository;
use App\Models\User;


class UserRepository implements IUserRepository {

    public function findAll()
    {
        return response()->json(User::paginate(15));
    }

    public function findById($id)
    {
        return User::find($id);
    }
}
