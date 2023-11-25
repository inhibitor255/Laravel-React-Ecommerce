<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (auth()->user()) {
            if (auth()->user()->is_admin === "yes") {
                return redirect()->route("admin.home");
            }
        }
        return view("auth.login");
    }

    public function postLogin(Request $request)
    {
        // Auth about whether admin or not
        $credentials = $request->validate([
            'email' => "required|email",
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            if (auth()->user()->is_admin === "yes") {
                return redirect()->route("admin.home");
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("auth.showLogin");
    }
}
