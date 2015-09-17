<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function login(LoginRequest $request)
    {
       auth()->attempt(['name' => $request->name, 'password']);
    }
}
