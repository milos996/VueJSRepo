<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyRegisterController extends Controller
{



    $validatedData = $request->validate([
        'name' => 'bail|required|string',
        'email' => 'required|unique:users',
    ]);



    public function register(array $data) {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
