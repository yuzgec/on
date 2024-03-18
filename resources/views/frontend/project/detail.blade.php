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
               {{ $Detay->title}}
            </h1>

            <div
                class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center">
                <a href="{{ route('home')}}">
                    <i class="ti-home"></i>
                </a>
                <i class="ti-angle-right fs-7 mx-15"></i>
                <a href="{{ route('home')}}">Anasayfa</a>
                <i class="ti-angle-right fs-7 mx-15"></i>
                <a href="{{ route('project')}}">Projelerimiz</a>
                <i class="ti-angle-right fs-7 mx-15"></i>

                <a href="#" class="stay c-default opacity-7">{{ $Detay->title}}</a>
            </div>

        </div>
    </div>
</section>
<section id="home" class="fullwidth pb-120 pt-90 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div id="gallery-items" class="lightbox_gallery">
                    @foreach ($Detay->getMedia('gallery') as $item)
                        <a href="{{ $item->getUrl() }}" class="cbp-item has-overlay-hover scale-hover-container">
                            <div class="work-image">
                                {{ $item }}
                            </div>
                            <div class="zi-5 overlay-hover slow bg-blur bg-soft-dark5 flex-column t-center">
                                <i class="ti-more white fs-22"></i>
                            </div>
                        </a>
                    @endforeach
                </div>
                <!-- End items -->
            </div>
            <!-- End col for project images -->
            <!-- Col for project details -->
            <div class="col-lg-3 col-12 t-left mt-70-sm">
                <!-- Subtitle -->
                <h4 class="fs-24 dark3 lh-35">
                    {{ $Detay->title}}
                </h4>
                <!-- Title -->
                <div class="fs-16 gray6 lh-25 mt-15">
                   {!! $Detay->desc !!}     
                </div>
                <!-- Detail -->
                {{-- <div class="mt-50">
                    <h5 class="fs-13 dark6 ls-05 medium">Client Logo</h5>
                    <img src="images/signature_dark.svg" alt="Example project logo template" class="mt-15 width-120">
                </div>
                <!-- Detail -->
                <div class="mt-15 pt-15 bt-1 b-gray1">
                    <h5 class="fs-13 dark6 ls-05 medium">Project Date</h5>
                    <p class="gray8 lh-25 fs-14 mt-5">20 December 2020</p>
                </div>
                <!-- Detail -->
                <div class="mt-15 pt-15 bt-1 b-gray1">
                    <h5 class="fs-13 dark6 ls-05 medium">Client Address</h5>
                    <p class="gray8 lh-25 fs-14 mt-5">3127 Massachusetts Avenue Washington DC</p>
                </div>
                <!-- Detail -->
                <div class="mt-15 pt-15 bt-1 b-gray1">
                    <h5 class="fs-13 dark6 ls-05 medium">Project Services</h5>
                    <p class="gray8 lh-25 fs-14 mt-5">Photography, Development, Graphic Design</p>
                </div>
                <!-- Detail -->
                <div class="mt-15 pt-15 bt-1 b-gray1">
                    <h5 class="fs-13 dark6 ls-05 medium">Client Website</h5>
                    <p class="gray8 lh-25 fs-14 mt-5"><a href="" target="_blank" class="underline-hover">www.google.com</a></p>
                </div>
                <!-- Detail -->
                <div class="mt-15 pt-15 bt-1 b-gray1">
                    <h5 class="fs-13 dark6 ls-05 medium">Paylaş</h5>
                    <!-- Facebook -->
                    <a href="" target="_blank" class="icon-sm opacity-8-hover bg-facebook white slow-sm mt-5 mr-5">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <!-- Twitter -->
                    <a href="https://twitter.com/share" target="_blank" class="icon-sm opacity-8-hover bg-twitter white slow-sm mt-15 mr-5">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <!-- Pinterest -->
                    <a href="https://pinterest.com/pin/create/button/?url=http://quadra.goldeyestheme.com/project-06.html/&amp;media=http://quadra.goldeyestheme.com/images/portfolio/project_06/image_01.jpg" target="_blank" class="icon-sm opacity-8-hover bg-pinterest white slow-sm mt-15 mr-5">
                        <i class="fab fa-pinterest"></i>
                    </a>
                    <!-- Linkedin -->
                    <a href="https://www.linkedin.com/shareArticle?url=http://quadra.goldeyestheme.com/project-06.html&amp;title=Quadra+Project+Template" target="_blank" class="icon-sm opacity-8-hover bg-linkedin white slow-sm mt-15 mr-5">
                        <i class="fab fa-linkedin"></i>
                    </a> --}}
                </div>
            </div>
            <!-- End col for project details -->
        </div>
        <!-- End row for cols -->
    </div>
</section>
@endsection
@section('customJS')
<script>
    (function($, window, document, undefined) {
        'use strict';
        $('#gallery-items').cubeportfolio({
            mediaQueries: [{
                width: 992,
                cols: 3,
            }, {
                width: 640,
                cols: 3,
            }, {
                width: 480,
                cols: 2,
            }],
            gapHorizontal: 5,
            gapVertical: 5,
            displayTypeSpeed: 0,
        });

    })(jQuery, window, document);
</script>
@endsection