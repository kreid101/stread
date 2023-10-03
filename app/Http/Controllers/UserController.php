<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function panel()
    {
        return view('dashboard');
    }
}
