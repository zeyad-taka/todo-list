<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController
{
    //
}

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // إنشاء حساب جديد
    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['message' => 'User Created Successfully', 'user' => $user]);
    }

    // تسجيل الدخول (المطلوب في التسجيل الصوتي)
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login Success', 'user' => Auth::user()]);
        }
        return response()->json(['message' => 'Invalid Credentials'], 401);
    }
}