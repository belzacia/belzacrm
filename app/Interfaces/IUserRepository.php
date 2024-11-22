<?php

namespace App\Interfaces;

use App\Models\User;

interface IUserRepository
{
    public function findAll();

    public function findById($id);
}
