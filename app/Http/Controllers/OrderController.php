<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopCart;
use Mlevent\Fatura\Gib;


class OrderController extends Controller
{
    public function index(){
        $All = ShopCart::withCount('getOrder')->get();
        //dd($All);
        return view('backend.order.index', compact('All'));
    }

    public function show($id){
        
        $Detail = ShopCart::with('getOrder')->where('cart_id',$id)->withCount('getOrder')->first();
        
        $gib = (new Gib)->setCredentials(config('settings.earsiv_portal_user'), config('settings.earsiv_portal_pass'))->login();
        $Invoce = $gib->getHtml($Detail->invoice_id);
        $Download = $gib->getDownloadURL($Detail->invoice_id);
        $gib->logout();
        return view('backend.order.show', compact('Detail', 'Invoice', 'Download'));
    }
}
