@extends('frontend.app.master')
@section('content')

<section id="home" class="relative bg-dark height-25vh mnh-250 align-items-center d-flex">
    <div class="container">
        <div class="t-center">
            <div class="container mt-30">
                <div class="t-center">
                    <h5 class="fs-11 ls-4 semibold white uppercase">ON DANCE STORE</h5>
                    <h1 class="mt-15 lh-md white">{{ $Detail->title }}</h1>
                    <div
                        class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center text-white">
                        <a href="{{ route('home')}}"><i class="ti-home"></i></a>
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
<section id="product-092385" class="mt-30 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session('success'))
                    <div class="alert alert-success">
                        <div class="d-flex" style="justify-content: space-between;">
                            <div> {{ session('success') }}</div>
                            <div style="text-align: right"> 
                                @if(Cart::instance('shopping')->count() > 0)
                                    <a href="{{ route('checkout')}}" class="btn btn-dark rounded">
                                        Ödeme Yap
                                    </a>
                                @endif
                            </div>  
                        </div>
                       
                    </div>
                @endif
           </div>
            <div class="col-lg-6 col-12">
                <div class="row row-eq-height">
                    <div class="col-2 pr-0">
                        <div id="image-pagination" class="nav-to-custom-slider block-img c-pointer" 
                            data-slick='{"speed":600, "vertical": true, "verticalSwiping": true, "lazyLoad": "progressive", "draggable":true, "slidesToShow": 4, "slidesToScroll": 1, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}},{"breakpoint": 768,"settings":{"slidesToShow": 3}}]}' >
                            <div class="pb-5">
                                <img src="/front/images/shop/lyra/product_loader.svg" 
                                data-lazy="{{ (!$Detail->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detail->getFirstMediaUrl('page', 'thumbpng')}}" 
                                alt="{{ $Detail->title}} - Karşıyaka On Dance" class="active-me b-1 b-colored">
                            </div>

                            @foreach($Detail->getMedia('gallery') as $item)
                                <div class="pb-5">
                                    <img src="/front/images/shop/lyra/product_loader.svg" 
                                    data-lazy="{{ $item->getUrl('thumbpng') }}" 
                                    alt="{{ $Detail->title}} - Karşıyaka On Dance" class="active-me b-1 b-colored">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-10 pr-0 pr-15-sm">
                        <div id="image-slider" class="custom-slider block-img arrows-mosaic controls-mouseover lightbox_gallery" 
                            data-slick='{ "asNavFor": ".nav-to-custom-slider", "dots": false, "fade": true, "speed":600, "lazyLoad": "progressive", "arrows": false, "draggable":false, "slidesToShow": 1, "slidesToScroll": 1, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}},{"breakpoint": 768,"settings":{"slidesToShow": 1}}]}' >
                            
                            <a href="{{ (!$Detail->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detail->getFirstMediaUrl('page', 'imgpng')}}" class="zoom c-point">
                                <img src="{{ (!$Detail->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detail->getFirstMediaUrl('page', 'imgpng')}}" 
                                alt="{{ $Detail->title}} - Karşıyaka On Dance" >
                            </a>  

                            @foreach($Detail->getMedia('gallery') as $item)
                                <a href="{{ $item->getUrl('imgpng') }}" class="zoom c-point">
                                    <img src="{{ $item->getUrl('imgpng') }}" 
                                    alt="{{ $Detail->title}} - Karşıyaka On Dance" >
                                </a>  
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-12 pl-30 pl-15-sm mt-70-sm">
                <div class="dark3 fs-10 lh-normal">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span class="ml-5 ls-1 relative top-1 fs-12">5.0</span>
                </div>

                <h2 class="fs-28 dark1 mt-15">
                    {{ $Detail->title }}
                </h2>

                <p class="mt-25 fs-13 uppercase gray6 medium ls-1">
                    <a href="#">ON DANCE SHOP</a>
                    <span class="mx-5">></span>
                    <a href="#">{{$Detail->firstCategoryName}}</a>
                </p>

                <p class="mt-25 font-secondary medium fs-26 gray8 lh-18">
                    {{ money($Detail->price )}}
                </p>

                <div class="mt-25 fs-16 dark1 lh-25">
                    {!! $Detail->short !!}
                </div>
                @if ($Detail->option4 == 1)
                <div class="d-inline-flex width-auto align-items-center justify-content-start py-10 px-20 radius-lg" data-color="#37302E" data-bgcolor="#F2E9E4">
                    <i class="ti-package fs-12 mr-10"></i>
                    <p class="fs-13">
                        Stok Kalmamıştır.
                    </p>
                </div>
                @endif
                <form action="{{ route('addtocart') }}" method="POST">
                    @csrf
                    <div class="col-md-7 col-12">
                        <input type="hidden" name="id" value="{{ $Detail->id }}">
                        @if ($Detail->firstCategoryName == 'Etkinlikler')
                            <input type="text" class="form-control mt-20 mb-20" name="student" placeholder="Katılımcı Adı Soyadı Giriniz" required width="80%">
                        @else

                     <div class="fs-14 gray8 mt-30">
                            Beden Seçin:
                        </div>

                        <div class="mt-20 d-flex justify-content-start align-items-center">

                            <div class="mr-10">
                                <input id="radioSize2" name="size" type="radio" class="check width-0 height-0 opacity-0 p-0" value="S"/>
                                <label for="radioSize2" class="d-inline-flex align-items-center justify-content-start c-pointer mb-0">
                                    <span class="uncheck d-flex align-items-center justify-content-center width-45 height-45 relative circle b-1 b-gray2" data-bgcolor="#F3F1F0">
                                        <span class="checked fullwidth fullheight circle zi-1 b-1" data-bgcolor="#000" data-bcolor="#000"></span>
                                        <span class="text absolute zi-2 fs-12 lh-12 gray7">S</span>
                                    </span>
                                </label>
                            </div>

                            <div class="mr-10">
                                <input id="radioSize3" name="size" type="radio" class="check width-0 height-0 opacity-0 p-0" value="M"/>
                                <label for="radioSize3" class="d-inline-flex align-items-center justify-content-start c-pointer mb-0">
                                    <span class="uncheck d-flex align-items-center justify-content-center width-45 height-45 relative circle b-1 b-gray2" data-bgcolor="#F3F1F0">
                                        <span class="checked fullwidth fullheight circle zi-1 b-1" data-bgcolor="#000" data-bcolor="#000"></span>
                                        <span class="text absolute zi-2 fs-12 lh-12 gray7">M</span>
                                    </span>
                                </label>
                            </div>

                            <div class="mr-10">
                                <input id="radioSize4" name="size" type="radio" class="check width-0 height-0 opacity-0 p-0" value="L"/>
                                <label for="radioSize4" class="d-inline-flex align-items-center justify-content-start c-pointer mb-0">
                                    <span class="uncheck d-flex align-items-center justify-content-center width-45 height-45 relative circle b-1 b-gray2" data-bgcolor="#F3F1F0">
                                        <span class="checked fullwidth fullheight circle zi-1 b-1" data-bgcolor="#000" data-bcolor="#000"></span>
                                        <span class="text absolute zi-2 fs-12 lh-12 gray7">L</span>
                                    </span>
                                </label>
                            </div>

                            <div class="mr-10">
                                <input id="radioSize5" name="size" type="radio" class="check width-0 height-0 opacity-0 p-0" value="XL"/>
                            
                                <label for="radioSize5" class="d-inline-flex align-items-center justify-content-start c-pointer mb-0">
                                    <span class="uncheck d-flex align-items-center justify-content-center width-45 height-45 relative circle b-1 b-gray2" data-bgcolor="#F3F1F0">
                                        <span class="checked fullwidth fullheight circle zi-1 b-1" data-bgcolor="#000" data-bcolor="#000"></span>
                                        <span class="text absolute zi-2 fs-12  lh-12gray7">XL</span>
                                    </span>
                                </label>
                            </div>
                        </div> 
                        @endif
                    </div>

           
                    <div class="mt-35 d-flex justify-content-start align-items-center">
                        @if ($Detail->option4 == 0)
                            <div class="d-flex align-items-center justify-content-center">
                                <button type="submit" class="height-55 width-150 d-block fs-15 lh-12 bg-colored white"><i class="fas fa-cart-plus"></i> SEPETE EKLE</button>
                            </div>
                        @endif
                       
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="https://api.whatsapp.com/send?phone={{config('settings.telefon2')}}&text=Merhaba {{ $Detail->title}} hakkında bilgi almak istiyorum."
                                class="btn height-55 width-200 white bg-success d-flex align-items-center ml-20" target="_blank">
                                <i class="fab fa-whatsapp"></i>  
                             WHATSAPP BİLGİ</a>
                        </div>
                </form>
                </div>
            </div>

            <div class="col-12 t-center mt-100 mt-50-sm">

                <div class="bb-1 b-gray2">
                    <ul class="nav justify-content-center d-inline-flex width-auto radius-md radius-no-lb radius-no-rb bt-1 br-1 bl-1 b-gray2" role="tablist">
                        <li role="presentation" class="d-flex">
                            <button type="button" data-bs-target="#tab10a" aria-selected="true" aria-controls="tab10a" role="tab" data-bs-toggle="pill" class="show md-btn px-15-sm bg-dark br-1 b-gray2 radius-md radius-no-right radius-no-lb dark4 white-active fs-11 bold uppercase slow-sm active">
                                Açıklama
                           </button>
                        </li>
                    </ul>
                </div>
            
                <div class="tab-content slide-effect t-center mt-30 light fs-18 gray7 lh-30">
            
                    <div id="tab10a" role="tabpanel" class="tab-pane active">
                        <div class="tab-container">
                               {!! $Detail->desc !!} 
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>


@endsection