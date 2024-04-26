<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopCart;
use Mlevent\Fatura\Gib;


class OrderController extends Controller
{
    public function index(){
        $All = ShopCart::withCount('getOrder')->get();
        return view('backend.order.index', compact('All'));
    }

    public function show($id){    
        $Detail = ShopCart::with('getOrder')->where('cart_id',$id)->withCount('getOrder')->first();
    
        return view('backend.order.show', compact('Detail'));
    }
}
