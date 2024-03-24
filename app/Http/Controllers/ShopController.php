<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    public function store(){
        return view('frontend.shop.index');
    }

    public function product($slug){

        $Detail = Product::where('slug', $slug)->firstOrFail();

        //dd($Detail);
        return view('frontend.shop.product',compact('Detail'));
    }

}
