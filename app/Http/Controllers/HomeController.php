<?php

namespace App\Http\Controllers;

class HomeController extends MainController
{

    public function index()
    {
        return view('index');
    }

}
