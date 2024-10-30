<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorPageController extends Controller
{
    public function error()
    {
        return view('errorPage');
    }
}
