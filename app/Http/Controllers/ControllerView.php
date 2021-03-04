<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerView extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function concerts()
    {
        return view('concerts');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function search()
    {
        return view('search');
    }
}
