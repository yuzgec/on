<?php

    use Spatie\Image\Image;
    use Gloudemans\Shoppingcart\Facades\Cart;

    function cartControl($id, $text = null){
        foreach (Cart::instance('shopping')->content() as $c){
            if($c->id == $id){
                echo $text;
            }
        }
    }

    function renderCategoriesCreate($categories, $level = 0) {
        foreach ($categories as $category) {
            // Derinliğe göre tire ekleyin
            $prefix = str_repeat('-', $level);
    
            echo '<option value="'.$category->id.'" >'.$prefix.' '.$category->title.'</option>';
    
            // Eğer alt kategoriler varsa, fonksiyonu tekrar çağır
            if (!empty($category->children)) {
                renderCategoriesCreate($category->children, $level + 1);
            }
        }
    }

    function renderCategoriesEdit($categories, $selectedCategories, $level = 0) {
        foreach ($categories as $category) {
            // Derinliğe göre tire ekleyin
            $prefix = str_repeat('-', $level);
            // Bu kategori seçili mi kontrol et
            $selected = in_array($category->id, $selectedCategories) ? 'selected' : '';
    
            echo '<option value="'.$category->id.'" '.$selected.'>'.$prefix.' '.$category->title.'</option>';
    
            // Eğer alt kategoriler varsa, fonksiyonu tekrar çağır
            if (!empty($category->children)) {
                renderCategoriesEdit($category->children, $selectedCategories, $level + 1);
            }
        }
    }


    // function imageupload($method, $image){
    //     if($method == 'Update'){
    //         $method->media()->where('collection_name', 'page')->delete();
    //     }

    //     $method->media()->where('collection_name', 'page')->delete();
    //     $method->addMedia($image)->toMediaCollection('page');

    // }

    // function imagesupload($method, array $image){
    //     foreach ($image as $item){
    //         $method->addMedia($item)->toMediaCollection('gallery');
    //     }
    // }


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
