<?php

namespace App\Http\Controllers;

use Auth;
use App\todolist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$todolisting = todolist::find(Auth::id());
			// dd($todolisting);
        return redirect()->route('todolist.index', compact('todolisting'));
    }
}
