<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. تسجيل مستخدم جديد (Register)
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed' // لازم تبعت password_confirmation في البوست مان
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    // 2. تسجيل الدخول (Login)
    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // التأكد من الإيميل
        $user = User::where('email', $fields['email'])->first();

        // التأكد من الباسورد
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response(['message' => 'بيانات الدخول غلط يا برنس'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    // 3. تسجيل الخروج (Logout)
    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return ['message' => 'Logged out'];
    }
}