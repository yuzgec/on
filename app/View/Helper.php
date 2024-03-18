<?php

use Spatie\Image\Image;
    //SWEETALERT MESAJLARI -
    use Gloudemans\Shoppingcart\Facades\Cart;

    function cartControl($id, $text = null){
        foreach (Cart::instance('shopping')->content() as $c){
            if($c->id == $id){
                echo $text;
            }
        }
    }

    function imageupload($method, $image){
        if($method == 'Update'){
            $method->media()->where('collection_name', 'page')->delete();
        }
        $w = Image::load($image)->getWidth();
        $h = Image::load($image)->getHeight();
        $method->media()->where('collection_name', 'page')->delete();
        $method->addMedia($image)->withCustomProperties(['width' => $w, 'height' => $h ])->toMediaCollection('page');

    }

    function imagesupload($method, array $image){
        foreach ($image as $item){
            $w = Image::load($item)->getWidth();
            $h = Image::load($item)->getHeight();
            $method->addMedia($item)->withCustomProperties(['width' => $w, 'height' => $h ])->toMediaCollection('gallery');
        }
    }


    //KULLANICI ADI BAŞ HARFLERİNİ GÖSTERME
    function isim($isim){
        $parcala = explode(" ", $isim);
        $ilk = mb_substr(current($parcala), 0,3);
        $son = mb_substr(end($parcala), 0,3);
        return $ilk.'***'.' '.$son.'***';
    }

    function money($deger){
        return number_format((float)$deger, 2, '.', '');
    }

    function cargo($toplam)
    {
        if ($toplam >= 0){
            if ($toplam >= CARGO_LIMIT) {
                return 'Ücretsiz Kargo';
            } else {
                return money(CARGO_PRICE.'₺');
            }
        }
        return;
    }

    function cargoToplam($toplam){

        if($toplam < CARGO_LIMIT){
            return money($toplam + CARGO_PRICE);
        }else{
            return $toplam;
        }
    }
