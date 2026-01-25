<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    function index(){
        return "selamat belajar framework laravel 12";
    }

    //
    public function ambilfile() {
        return view('ambilfile');
        //
    }
}
