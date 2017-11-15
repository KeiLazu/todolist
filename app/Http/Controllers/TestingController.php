<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function testing()
    {
        dd('on Testing');
    }
}
