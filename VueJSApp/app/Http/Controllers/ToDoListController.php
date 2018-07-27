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
        $validatedData = $request->validate([
            'title' => 'bail|required|string|max:255',
            'note' => 'bail|required|string',
            'is_priority' => 'bail|required|boolean',
            'is_done' => 'bail|required|boolean',
        ]);

        $todo =  ToDo::create([
            'title' => $request->input('title'),
            'note' => $request->input('note'),
            'is_priority' => $request->input('is_priority'),
            'is_done' => $request->input('is_done'),
        ])
    }

    public function destroy()
    {

    }
}
