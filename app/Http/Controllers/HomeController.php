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
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['employee', 'manager']);
            
        $todolisting = todolist::find(Auth::id());
			// dd($todolisting);
        return redirect()->route('todolist.index', compact('todolisting'));

    }
}
