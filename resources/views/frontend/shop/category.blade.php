@extends('frontend.app.master')
@section('content')
<section id="home" class="relative bg-dark height-25vh mnh-250 align-items-center d-flex">
    <div class="container-md">
        <div class="t-center">
        
            <div class="container-md mt-30">
                <div class="t-center">
                    <h5 class="fs-11 ls-4 semibold white uppercase">
                        ON DANCE STORE
                    </h5>
                    <h1 class="mt-15 lh-md white">
                        {{ $Detail->title }}
                    </h1>
        
                    <div
                        class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center text-white">
                        <a href="{{ route('home')}}">
                            <i class="ti-home"></i>
                        </a>
                        <i class="ti-angle-right fs-7 mx-15"></i>
                        <a href="{{ route('home')}}" title="Anasayfa">Anasayfa</a>
                        <i class="ti-angle-right fs-7 mx-15"></i>
                        <a href="{{ route('store')}}" title="Store" class="stay c-default opacity-7">Store</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="products" class="epsilon-products pt-100 pb-120" data-bg="url(/front/images/shop/epsilon/background_gradient.svg)">
       
        <div class="container mt-70">
            <div id="product-items" class="product-items t-center">
                @foreach ($Products as $item)
                     <div class="cbp-item product">
                    <a href="{{ route('product', $item->slug) }}" class="d-flex">
                        <div class="px-15 pt-15 pb-30 bg-transparent bg-white-hover bs-epsilon-hover slow">
                            <img src="/front/images/shop/epsilon/product_loader.svg" 
                            data-cbp-src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'thumb')}}"
                             alt="Portfolio picture template">
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
