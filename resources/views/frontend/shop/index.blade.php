@extends('frontend.app.master')
@section('content')
    <section id="home" class="fullwidth height-85vh mnh-500 mnh-350-sm d-flex align-items-center bg-bottom relative" data-bg="url(/front/images/shop/epsilon/background_01.jpg)">
        <div class="section-waves" data-bg="url(/front/images/shop/epsilon/epsilon_wave_bottom.svg)"></div>
        <div class="container-fluid t-center relative zi-5 mb-20">
            <h2 class="font-secondary bold fs-45 fs-25-sm white lh-60 lh-35-sm">
                Design your living space in the most beautiful way. <br class="visible-lg">
                All good vibes can fit into a picture.
            </h2>
            <h5 class="font-secondary fs-18 white lh-25 mt-30 mt-15-sm">
                The products on this page can be linked to any shopping site. <br class="visible-lg">
                It can also be used as a gallery or portfolio.
            </h5>
            <a href="#products" class="lg-btn uppercase white dark-hover fs-13 lh-13 ls-1 mt-30 b-2 b-white d-inline-flex bg-white-hover medium slow-sm">
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
                            <img src="/front/images/shop/epsilon/product_loader.svg" 
                            data-cbp-src="/front/images/shop/epsilon/product_01.jpg"
                             alt="Portfolio picture template">
                            <p class="fs-12 gray6 uppercase mt-30 ls-2">{{ $item->firstCategoryName}}</p>
                            <h4 class="color-brown fs-18 mt-5">{{ $item->title}}</h4>
                            <p class="fs-14 color-brown mt-5">{{ $item->price}}₺</p>
                        </div>
                    </a>
                </div>
                @endforeach
               
            </div>
        </div>
    </section>
@endsection
