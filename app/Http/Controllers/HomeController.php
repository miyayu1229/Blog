<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //マイページを表示
    public function index()
    {
        return view('home');
    }
}
