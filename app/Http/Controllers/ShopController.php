<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Basket;
use Gloudemans\Shoppingcart\Facades\Cart;


class ShopController extends Controller
{
    public function store(){
        return view('frontend.shop.index');
    }

    public function product($slug){
        $Detail = Product::where('slug', $slug)->firstOrFail();
        return view('frontend.shop.product',compact('Detail'));
    }

    public function category($slug){
        $Detail = ProductCategory::where('slug', $slug)->firstOrFail();
        //dd($Detail);
        
        $Products= Product::whereHas('categories', function ($query) use ($Detail) {
            $query->where('categories.id', $Detail->id);
        })
        ->where('status', 1)
        ->with(['categories' => function ($query) {
            $query->select('id', 'parent_id');
        }])
        ->orderBy('sku', 'asc')
        ->paginate(100);

        //dd($Products);
        return view('frontend.shop.category',compact('Detail', 'Products'));
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
        session()->flash('msg', 'Successfully done the operation.');

        return redirect()->back();
    }

}
