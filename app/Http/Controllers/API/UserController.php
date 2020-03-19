<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('reportViews')->get();
        return response($users,200);
    }
}
