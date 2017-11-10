<?php

namespace App\Http\Controllers;

use Auth;
use App\todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolisting = todolist::with('user')->where('user_id',Auth::id())->get();
        // $todolisting = todolist::all();
        // dd($todolisting);
        return view('todolist.index', compact('todolisting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        todolist::create($request->all());
        // dd($request->all());
        // $insertTodolist->save();
        return redirect()->route('todolist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(todolist $todolist)
    {
        $todolist = todolist::where('id', $todolist->id)->first();
        // dd($todolist);
        return view('todolist.show', compact('todolist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(todolist $todolist)
    {
        $todolist = todolist::where('id', $todolist->id)->first();
        return view('todolist.edit', compact('todolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todolist $todolist)
    {
        $todolisting = todolist::find($todolist)->first()->update($request->all());
        return redirect()->route('todolist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(todolist $todolist)
    {
        todolist::find($todolist)->first()->delete();
        return redirect()->route('todolist.index');
    }
}
