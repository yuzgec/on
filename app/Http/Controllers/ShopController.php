<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use Gloudemans\Shoppingcart\Facades\Cart;


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


    public function addtocart(Request $request)
    {

        $p = Product::find($request->id);

        Basket::create(['product_id' => $p->id]);

        Cart::instance('shopping')->add(
            [
                'id' => $p->id,
                'name' => $p->title,
                'price' => $p->price,
                'weight' => 0,
                'qty' => 1,
                'options' => [
                    'image' => (!$p->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $p->getFirstMediaUrl('page', 'small'),
                    'cargo' => 0,
                    'campagin' => null,
                    'category' => $p->firstCategoryName,
                    'size' => ($request->size) ? $request->size : null,
                    'color' => ($request->color) ? $request->color : null,
                    'url' => $p->slug,
                    'student' => $request->student
                ]
            ]);
        alert()->success($p->title.' sepetinize eklendi', 'Başarıyla '.SWEETALERT_MESSAGE_CREATE);
        //alert()->image('Image Title!','Image Description','Image URL','Image Width','Image Height','Image Alt');

        return redirect()->back()->with('added');
    }

}
