<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLogin()
    {
        return view("login", [
            "title" => "Login",
        ]);
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $level = auth()->user()->roleLevel;
            if ($level == 1) {
                return redirect("/owner");
            } else if ($level == 2) {
                return redirect("/head");
            } else if ($level == 3) {
                return redirect("/hr");
            } else if ($level == 4) {
                return redirect("/");
            }
        } else {
            echo "error";
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("showLogin");
    }
}
