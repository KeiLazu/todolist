<?php

namespace App\Http\Controllers;

use Auth;
use App\todolist;
use App\UserDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class TodolistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function exporting()
    {
        // dd('on export excel');
        $todolist = todolist::select('title', 'container', 'status', 'user_id')->get();
        // dd($todolist);
        return Excel::create('datatodolist', function($excel) use($todolist){
            $excel->sheet('mysheet', function($sheet) use($todolist){
                $sheet->fromArray($todolist);
            });
        })->download('xls');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolisting = todolist::where('user_id',Auth::id())->get();
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

    public function showPrint(todolist $todolist, UserDetail $userDetail)
    {
        $todolist = todolist::where('id', $todolist->id)->first();
        $userDetail = UserDetail::where('user_id', Auth::id())->first();
        // dd($userDetail);
        return view('print.index', compact('todolist', 'userDetail'));

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
        $todolisting = todolist::where('id', $todolist->id)->first()
        ->update($request->all());
        // dd($todolisting);
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

    public function importing(Request $request)
    {
        if($request->hasFile('file')) 
        {
            $path = $request->file('file');
            $data = Excel::load($path, function($reader){})->get();
            // dd($data);
            if(!empty($data) && $data->count()) 
            {                    
                foreach($data as $key=>$val) 
                {
                    $todolist = new todolist;
                    $todolist->title = $val->title;
                    $todolist->container = $val->container;
                    if(($val->status == NULL))
                    {
                        $todolist->status = 0;
                    } else {
                        $todolist->status = $val->status;

                    }
                    
                    $todolist->user_id = $val->user_id;
                    
                    $todolist->save();
                }
                // dd($todolist);
                
            }
        }
        return redirect()->route('todolist.index');  
    }

    public function importexport()
    {
        return view('todolist.importexport');
    }

    public function makePDF()
    {
        $todolist = todolist::where('user_id', Auth::id())->get();
        $userDetail = UserDetail::where('user_id', Auth::id())->first();
        // dd($userDetail);
        $pdf = PDF::loadView('todolist.pdf', compact('todolist', 'userDetail'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream();
        // return view('todolist.pdf');
    }

}
