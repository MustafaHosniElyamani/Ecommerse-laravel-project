<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Order;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $color = Color::all();
        $size = Size::all();
    $viewData = [];
    $viewData["title"] = "My Orders - Online Store";
    $viewData["subtitle"] = "My Orders";
    $viewData["orders"] = Order::where('user_id', Auth::user()->getId())->get();
    return view('myaccount.index')->with("viewData", $viewData)
    ->with('color',$color)
    ->with('size',$size);
    }

}
