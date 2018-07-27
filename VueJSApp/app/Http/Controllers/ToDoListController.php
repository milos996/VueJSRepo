<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoListController extends Controller
{


    public function index()
    {

    }

    public function show()
    {
        $user = auth()->user();

        return $user->getTasks();
    }

    public function update(Request $request)
    {
        $request->validate([
        'title' => 'bail|required|unique:todos|max:255',
        '' => '',
        ]);

    }

    public function destroy()
    {

    }
}
