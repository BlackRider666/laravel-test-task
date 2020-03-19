<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $token = $user->createToken('api')->plainTextToken;
        return response()->json(['token' => $token], 200);
    }

    public function token(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:4'],
            ]);
        } catch (ValidationException $e) {
            return response($e,401);
        }
        $user = User::where('email', $request->get('email'))->first();
        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
        }
        return response()->json(['token' => $user->createToken('api')->plainTextToken]);
    }
}
