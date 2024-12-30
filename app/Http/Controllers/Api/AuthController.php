<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLoginForm()
{
    return view('auth.login');
}
    public function register(Request $request)
    {
        $input = [
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            "role" => $request->role ?? 'user',
        ];

        $user = User::create($input);
        return response()->json([
            "status" => "success",
            "message" => "Register success"
        ]);
    }
    public function login(Request $request)
    {
        $input = [
            "email" => $request->email,
            "password" => $request->password,
        ];
    
        $user = User::where("email", $input["email"])->first();

        if (!$user || !Hash::check($input["password"], $user->password)) {
            return response()->json([
                "code" => 401,
                "status" => "error",
                "message" => "Login failed"
            ]);
        }

        // Tambahkan pengecekan role
        if ($user->role !== 'admin') {
            return response()->json([
                "code" => 403,
                "status" => "error",
                "message" => "Access denied"
            ]);
        }

        $token = $user->createToken("token")->plainTextToken;
        return response()->json([
            "code" => 200,
            "status" => "success",
            "message" => "Login success",
            "token" => $token,
            "role" => $user->role, 
        ]);
    }

}
