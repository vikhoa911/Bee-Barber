<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Xử lí logic login, logout của admin
    public function login()
    {
        return view('admin.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember'); // kiểm tra checkbox

        if (Auth::attempt($credentials, $remember)) {
            //Login thành công
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
