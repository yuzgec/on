@extends('frontend.app.master')

@section('customCSS')
<style>
    /* Change secondary font for this page */
    .font-secondary{font-family: 'Nanum Myeongjo', serif !important;}

    /* Colors for this page */
    .color-brown,.color-brown-hover:hover{color:#585353!important;}
    .bg-brown,.bg-brown-hover:hover{background-color:#585353!important;}

    /* Overflow option for shadow effect on the products */
    .epsilon-products .cbp-wrapper-outer,.epsilon-products .product-items, .epsilon-products .product-items .product{ overflow: visible; }

    /* .bs-epsilon class to get box shadow options */
    .bs-epsilon, .bs-epsilon-hover:hover{box-shadow:0px 15px 97px 0px rgba(0,0,0,0.11)!important}
</style>

    
@endsection
@section('content')
    <section id="home" class="fullwidth height-100vh mnh-500 mnh-350-sm d-flex align-items-center bg-bottom relative"
     data-bg="url(/store.jpg)">
        <div class="section-waves" data-bg="url(/front/images/shop/epsilon/epsilon_wave_bottom.svg)"></div>
        <div class="container-fluid t-center relative zi-5 mb-20">
            <a href="#products" class="lg-btn uppercase white dark-hover fs-13 lh-13 ls-1 mt-250 b-2 b-white d-inline-flex bg-white-hover medium slow-sm">
                Ürünleri İnceleyin
            </a>
        </div>
    </section>

    <section id="products" class="epsilon-products pt-100 pb-120" data-bg="url(/front/images/shop/epsilon/background_gradient.svg)">
        <div class="container mt-70">
            <div id="product-items" class="product-items t-center">
                @foreach ($Product as $item)
                     <div class="cbp-item product">
                        <a href="{{ route('product', $item->slug) }}" class="d-flex">
                            <div class="px-15 pt-15 pb-30 bg-transparent bg-white-hover bs-epsilon-hover slow">
                                <img src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'thumbpng')}}"
                                alt="{{ $item->title}} - ON DANCE STORE">
                                <p class="fs-12 gray6 uppercase mt-30 ls-2">{{ $item->firstCategoryName}}</p>
                                <h4 class="color-brown fs-18 mt-5">{{ $item->title}}</h4>
                                <p class="fs-14 color-brown mt-5">{{ money($item->price) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


@section('customJS')

<script>
    (function($, window, document, undefined) {
        'use strict';
        $('#product-items').cubeportfolio({
            mediaQueries: [{
                width: 992,
                cols: 4,
            }, {
                width: 640,
                cols: 2,
            }, {
                width: 480,
                cols: 1,
            }],
            layoutMode: 'grid',
            gridAdjustment: 'responsive',
            drag: true,
            auto: false,
            autoTimeout: 5000,
            autoPauseOnHover: true,
            showNavigation: true,
            showPagination: true,
            rewindNav: true,
            scrollByPage: false,
            gapHorizontal: 10,
            gapVertical: 10,
            caption: 'none',
            animationType: 'quicksand',
            displayType: 'none',
            displayTypeSpeed: 0,
        });

    })(jQuery, window, document);

</script>
@endsection