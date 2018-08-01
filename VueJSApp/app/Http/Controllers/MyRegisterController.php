<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class MyRegisterController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    }
}
