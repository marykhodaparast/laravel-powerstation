<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //404 error
    public function not_found()
    {
        return view('errors.404');
    }
}
