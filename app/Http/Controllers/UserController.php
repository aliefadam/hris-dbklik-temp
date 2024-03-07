<?php

namespace App\Http\Controllers;

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

    public function login()
    {
        $credentials = [];
        Auth::attempt();
    }
}
