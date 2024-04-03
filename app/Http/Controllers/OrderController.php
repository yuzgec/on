<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopCart;

class OrderController extends Controller
{
    public function index(){
        $All = ShopCart::withCount('getOrder')->get();
        //dd($All);
        return view('backend.order.index', compact('All'));
    }
}
