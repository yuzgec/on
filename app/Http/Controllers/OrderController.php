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

        $Invoice = null;
        $Download = null;
        
        $Detail = ShopCart::with('getOrder')->where('cart_id',$id)->withCount('getOrder')->first();
        if($Detail->invoice_id){
            $gib = (new Gib)->setCredentials(config('settings.earsiv_portal_user'), config('settings.earsiv_portal_pass'))->login();
            $Invoice = $gib->getHtml($Detail->invoice_id);
            $Download = $gib->getDownloadURL($Detail->invoice_id);
        }
     

        return view('backend.order.show', compact('Detail', 'Invoice', 'Download'));
    }
}
