<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoListMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return $user->tasks();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'user_id' => auth()->user()->id;
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ToDo::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ToDo::find($id)
                 ->update(['title' => $request->input('title'),
                           'note' => $request->input('note'),
                           'is_priority' => $request->input('is_priority'),
                           'is_done' => $request->input('is_done')
                          ]);

        return ToDo::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ToDo::destroy($id);
    }
}
