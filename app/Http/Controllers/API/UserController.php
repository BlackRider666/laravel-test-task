<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        $users = User::with('reportViews')->get();

        return response($users,200);
    }
}
