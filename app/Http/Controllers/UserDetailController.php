<?php

namespace App\Http\Controllers;

use Auth;
use App\UserDetail;
use App\User;
use App\todolist;
use Illuminate\Http\Request;

class UserDetailController extends Controller
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
        $userdetaillist = UserDetail::where('user_id',Auth::id())->first();
        // dd($userdetaillist);
        if(!empty($userdetaillist))
        {
            // ke show detail
            return redirect('userdetail/' . Auth::id());

        } else {
            // bikin ke user detail
            return redirect()->route('userdetail.create');

        }

        // return redirect()->route('todolist.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userdetail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserDetail::create($request->all());
        return redirect()->route('userdetail.show', Auth::id());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        $UserDetail = UserDetail::where('id', $userDetail->id)->first();
        // dd($todolist);
        return view('userdetail.show', compact('UserDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $userDetail)
    {
        $UserDetail = UserDetail::where('user_id', Auth::id())->first();
        // dd($UserDetail);
        return view('userdetail.edit', compact('UserDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $userDetail)
    {
        $UserDetail = UserDetail::where('user_id', Auth::id())->first()->update($request->all());
        return redirect()->route('userdetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }
}
