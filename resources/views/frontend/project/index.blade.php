@extends('frontend.app.master')
@section('customCSS')
<style>
    /* Image animation */
    .cbp-item .work-image{-webkit-transform:scale(1);transform:scale(1); -webkit-transition:transform 0.5s;transition:transform 0.5s;}
    .cbp-item:hover .work-image{-webkit-transform:scale(1.03);transform:scale(1.03);}
    /* Details animation */
    .cbp-item .details{opacity:0;-webkit-transform:scale(1.04) perspective(1000px);transform:scale(1.04) perspective(1000px);-webkit-transition:all 0.5s;transition:all 0.5s;}
    .cbp-item:hover .details{opacity:1;-webkit-transform:scale(1) perspective(1000px);transform:scale(1) perspective(1000px);}
    /* Texts and line animations */
    .cbp-item .details .title, .cbp-item .details .tag{opacity:0;-webkit-transform:translateY(15px);transform:translateY(15px);-webkit-transition:all 0.5s;transition:all 0.5s;}
    .cbp-item:hover .details .title, .cbp-item:hover .details .tag{opacity:1;-webkit-transform:translateY(0px);transform:translateY(0px);}
    .cbp-item:hover .details .tag{-webkit-transition-delay:0.1s;transition-delay:0.1s;}
    .cbp-item .details .line{-webkit-transition:all 0.3s;transition:all 0.3s;}
    .cbp-item:hover .details .line{width:70px!important;}

    /* Dots Navigation */
    .dots-circle .cbp-nav-pagination{bottom:-60px;}
    .dots-circle .cbp-nav-pagination .cbp-nav-pagination-item{width:25px;height:25px;background-color:transparent;border-radius:50%;display:inline-flex;display:-ms-inline-flexbox;justify-content:center;-ms-flex-pack:center;align-items:center;-ms-flex-align:center;}
    .dots-circle .cbp-nav-pagination .cbp-nav-pagination-item:before{width:5px;height:5px;background-color:#222;box-shadow:inset 0 0 0 0.5px transparent;-webkit-transform:scale(1);transform:scale(1);content:'';display: block;border-radius:inherit;-webkit-transition:all 0.5s;transition:all 0.5s;}
    .dots-circle .cbp-nav-pagination .cbp-nav-pagination-item.cbp-nav-pagination-active:before{box-shadow:inset 0 0 0 0.5px #222;background-color:transparent!important;-webkit-transform:scale(3);transform:scale(3);}

    /* Dots Navigation */
    .cbp-nav-controls{position:absolute;left:0;top:0;z-index:100;width:100%;height:100%;pointer-events:none;}
    .cbp-nav-controls div{font-size:20px;color:white;border-radius:0;background:rgba(24,24,24,0.3);position:absolute;top:50%;width:40px;height:90px;left:0;opacity:0;z-index:5;cursor:pointer;pointer-events:all;display:inline-flex;display:-ms-inline-flexbox;justify-content:center;-ms-flex-pack:center;align-items:center;-ms-flex-align:center;-webkit-transform:translateY(-50%);transform:translateY(-50%);-webkit-transition:all 0.5s;-moz-transition:all 0.5s;transition:all 0.5s;}
    .cbp:hover .cbp-nav-controls div{opacity:.55;}
    .cbp-nav-controls div.cbp-nav-next{left:auto;right:1px;}
    .cbp-nav-controls div:before,.cbp-nav-controls div:after{content:"\e64a";display:inline-flex;display:-ms-inline-flexbox;z-index:2;font-family:'themify';color:inherit;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;transition:all 0.5s;}
    .cbp-nav-controls div:after{display:none;content:'';z-index:0;}
    .cbp:hover .cbp-nav-controls div:hover{opacity:1;}
    .cbp-nav-controls div.cbp-nav-next:before{content:"\e649";}
</style>
@endsection
@section('content')
<section id="home" class="relative white height-25vh mnh-250 align-items-center d-flex" 
data-bg="url(https://goldeyes.net/quadra/images/backgrounds/background_25.jpg)" 
data-was-processed="true" 
style="background-image: url(https://goldeyes.net/quadra/images/backgrounds/background_25.jpg);">
    <div class="container-md">
        <div class="t-center">
            <h5 class="fs-11 ls-4 semibold white uppercase">
               Ahmet Gökşin Güzeltepe
            </h5>
            <h1 class="mt-15 lh-md white">
               Projelerimiz
            </h1>

            <div
                class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center">
                <a href="{{ route('home')}}">
                    <i class="ti-home"></i>
                </a>
                <i class="ti-angle-right fs-7 mx-15"></i>
                <a href="{{ route('home')}}">Anasayfa</a>
                <i class="ti-angle-right fs-7 mx-15"></i>
                <a href="#" class="stay c-default opacity-7">Projelerimiz</a>
            </div>

        </div>
    </div>
</section>

<section id="portfolio-grid" class="pb-120 pt-90 bt-1 b-gray1 b-solid">
    <div class="container-fluid">
        <div class="t-center">
            {{-- <ul class="filter-tags justify-content-center d-inline-flex mansalva medium uppercase bb-1 b-solid b-gray2" role="tablist">
                <li>
                    <div data-filter="*" class="cbp-filter-item fs-11 py-15 px-35 px-10-sm py-10-sm bb-1 b-transparent c-pointer b-colored-active relative top-1">
                        Tümü
                    </div>
                </li>
                <li>
                    <div data-filter=".art" class="cbp-filter-item fs-11 py-15 px-35 px-10-sm py-10-sm bb-1 b-transparent c-pointer b-colored-active relative top-1">
                        Katalog
                    </div>
                </li>
                <li>
                    <div data-filter=".photography" class="cbp-filter-item fs-11 py-15 px-35 px-10-sm py-10-sm bb-1 b-transparent c-pointer b-colored-active relative top-1">
                        Ambalaj Tasarım
                    </div>
                </li>
                <li>
                    <div data-filter=".graphic" class="cbp-filter-item fs-11 py-15 px-35 px-10-sm py-10-sm bb-1 b-transparent c-pointer b-colored-active relative top-1">
                        Logo Tasarım
                    </div>
                </li>
                <li>
                    <div data-filter=".brand" class="cbp-filter-item fs-11 py-15 px-35 px-10-sm py-10-sm bb-1 b-transparent c-pointer b-colored-active relative top-1">
                        Web Sitesi
                    </div>
                </li>
            </ul>
        </div> --}}

        <div class="col t-center">
            <h1 class="lh-45 mt-10 uppercase">PROJELERİMİZ</h1>
            <p class="light gray6 mt-15 lh-30 fs-18">Ajans olarak yapmış olduğumuz bazı örnek çalışmaları inceleyebilirsiniz.</p>
        </div>

        <div id="portfolio-items" class="mt-40">
            @foreach ($Service->where('category', 2) as $item)
                <a href="{{ route('projectdetail', $item->slug)}}" class="cbp-item art photography">
                    <div class="work-image">
                        <img src="{{ $item->getFirstMediaUrl('page', 'thumb') }}" 
                             alt="{{ $item->title}} - Gökşin Güzeltepe" />
                    </div>
                    <div class="details py-20 px-15 zi-5 overlay bg-blur bg-soft-dark5 flex-column t-center">
                        <div class="line bg-colored1 height-1 width-0"></div>
                        <h3 class="fs-25 lh-50 fs-30-sm ls--1 extrabold black underline-large bigger down2x lighter px-5"> {{ $item->title}} </h3>
                        <div class="tag capitalize white uppercase ls-1 fs-11">Katalog, Broşür</div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</section>
@endsection
@section('customJS')
<script>
    (function($, window, document, undefined) {
        'use strict';
        // init cubeportfolio
        $('#portfolio-items').cubeportfolio({
            mediaQueries: [{
                width: 992,
                cols: 5,
            }, {
                width: 640,
                cols: 2,
            }, {
                width: 480,
                cols: 1,
            }],
            filters: '.filter-tags',
            defaultFilter: '*',
            layoutMode: 'masonry',
            gridAdjustment: 'responsive',
            gapHorizontal: 0,
            gapVertical: 0,
            caption: 'none',
            animationType: 'quicksand',
            displayType: 'none',
            displayTypeSpeed: 0,
        });

        //Get .active class for filters
        $(".cbp-filter-item-active").addClass("active");
        $("[data-filter]").on("click", function(){
            $("[data-filter]").removeClass("active");
            $(".cbp-filter-item-active").addClass("active");
        });

    })(jQuery, window, document);
</script>
@endsection