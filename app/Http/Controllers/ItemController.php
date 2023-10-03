<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ItemController extends Controller
{
    function index(Request $request)
    {
        $item=Items::with('about')->find($request->id);
        $cart=unserialize(Redis::get('cart_'.session()->getId())) ? $this->items=unserialize(Redis::get('cart_'.session()->getId())) : null;
        return view('Item',compact('item','cart'));

    }
    function get_brands()
    {
        $brands=Brands::all();
        return response($brands,200);
    }

}
