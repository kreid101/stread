<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $hits=Items::all();
        return view('main',compact('hits'));
    }

}
