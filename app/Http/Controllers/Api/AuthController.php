<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Login;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken($validatedData['email']);

        $response = [
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token->accessToken,
        ];

        return $response;
    }

    public function login(UserRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $user = User::where('email', $validatedData['email'])->firstOrFail();
        } catch (ModelNotFoundException) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (!Hash::check($validatedData['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        Login::create([
            'email' => $validatedData['email'],
            'login_time' => now(),
        ]);

        $token = $user->createToken($validatedData['email']);

        $response = [
            'user' => $user,
            'token' => $token->accessToken,
        ];

        return $response;
    }

    public function getLatestLoginId()
    {
        $latestLogin = Login::latest()->first();

        return response()->json(['latest_login_id' => $latestLogin->user_id]);
    }
}
