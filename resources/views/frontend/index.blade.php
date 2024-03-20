@extends('frontend.app.master')
@section('customCSS')
<style>
    .cbp-item .work-image{-webkit-transform:scale(1);transform:scale(1); -webkit-transition:transform 0.5s;transition:transform 0.5s;}
    .cbp-item:hover .work-image{-webkit-transform:scale(1.03);transform:scale(1.03);}
    .cbp-item .details{opacity:0;-webkit-transform:scale(1.04) perspective(1000px);transform:scale(1.04) perspective(1000px);-webkit-transition:all 0.5s;transition:all 0.5s;}
    .cbp-item:hover .details{opacity:1;-webkit-transform:scale(1) perspective(1000px);transform:scale(1) perspective(1000px);}
    .cbp-item .details .title, .cbp-item .details .tag{opacity:0;-webkit-transform:translateY(15px);transform:translateY(15px);-webkit-transition:all 0.5s;transition:all 0.5s;}
    .cbp-item:hover .details .title, .cbp-item:hover .details .tag{opacity:1;-webkit-transform:translateY(0px);transform:translateY(0px);}
    .cbp-item:hover .details .tag{-webkit-transition-delay:0.1s;transition-delay:0.1s;}
    .cbp-item .details .line{-webkit-transition:all 0.3s;transition:all 0.3s;}
    .cbp-item:hover .details .line{width:70px!important;}
    .dots-circle .cbp-nav-pagination{bottom:-60px;}
    .dots-circle .cbp-nav-pagination .cbp-nav-pagination-item{width:25px;height:25px;background-color:transparent;border-radius:50%;display:inline-flex;display:-ms-inline-flexbox;justify-content:center;-ms-flex-pack:center;align-items:center;-ms-flex-align:center;}
    .dots-circle .cbp-nav-pagination .cbp-nav-pagination-item:before{width:5px;height:5px;background-color:#222;box-shadow:inset 0 0 0 0.5px transparent;-webkit-transform:scale(1);transform:scale(1);content:'';display: block;border-radius:inherit;-webkit-transition:all 0.5s;transition:all 0.5s;}
    .dots-circle .cbp-nav-pagination .cbp-nav-pagination-item.cbp-nav-pagination-active:before{box-shadow:inset 0 0 0 0.5px #222;background-color:transparent!important;-webkit-transform:scale(3);transform:scale(3);}
    .cbp-nav-controls{position:absolute;left:0;top:0;z-index:100;width:100%;height:100%;pointer-events:none;}
    .cbp-nav-controls div{font-size:20px;color:white;border-radius:0;background:rgba(24,24,24,0.3);position:absolute;top:50%;width:40px;height:90px;left:0;opacity:0;z-index:5;cursor:pointer;pointer-events:all;display:inline-flex;display:-ms-inline-flexbox;justify-content:center;-ms-flex-pack:center;align-items:center;-ms-flex-align:center;-webkit-transform:translateY(-50%);transform:translateY(-50%);-webkit-transition:all 0.5s;-moz-transition:all 0.5s;transition:all 0.5s;}
    .cbp:hover .cbp-nav-controls div{opacity:.55;}
    .cbp-nav-controls div.cbp-nav-next{left:auto;right:1px;}
    .cbp-nav-controls div:before,.cbp-nav-controls div:after{content:"\e64a";display:inline-flex;display:-ms-inline-flexbox;z-index:2;font-family:'themify';color:inherit;-webkit-transition:all 0.5s;-moz-transition:all 0.5s;transition:all 0.5s;}
    .cbp-nav-controls div:after{display:none;content:'';z-index:0;}
    .cbp:hover .cbp-nav-controls div:hover{opacity:1;}
    .cbp-nav-controls div.cbp-nav-next:before{content:"\e649";}
</style>

<style>
    .rotate-container{ height: auto; -webkit-perspective: 1000px; -moz-perspective: 1000px; -o-perspective: 1000px; perspective: 1000px; }
    .rotate-box .front, .back{ width: 100%; height: 100%; }
    .rotate-box{ width: 100%; height: 300px; position: relative; -webkit-transition: 0.6s; -webkit-transform-style: preserve-3d; -moz-transition: 0.6s; -moz-transform-style: preserve-3d; -o-transition: 0.8s; -o-transform-style: preserve-3d; transition: 0.8s; transform-style: preserve-3d; -webkit-perspective: 1000px; -moz-perspective: 1000px; -o-perspective: 1000px; perspective: 1000px; pointer-events: none; }
    .rotate-box .front, .rotate-box .back{ -webkit-backface-visibility: hidden; -moz-backface-visibility: hidden; -o-backface-visibility: hidden; backface-visibility: hidden; position: absolute; top: 0; left: 0; perspective: inherit; -webkit-transform-style: preserve-3d; transform-style: preserve-3d; }
    .rotate-box .front{ z-index: 2; }
    .rotate-box .back{ -webkit-transform: rotateY(180deg); -moz-transform: rotateY(180deg); -o-transform: rotateY(180deg); transform: rotateY(180deg); }
    .rotate-box .box-details{ -webkit-transform: translate3d(0,-50%,75px) scale(.85) translateZ(0); -moz-transform: translate3d(0,-50%,75px) scale(.85) translateZ(0); -o-transform: translate3d(0,-50%,75px) scale(.85) translateZ(0); transform: translate3d(0,-50%,75px) scale(.85) translateZ(0); display: block; -webkit-transform-style: preserve-3d; transform-style: preserve-3d; perspective: inherit; top:50%; position: relative; text-align: center; width: 100%; backface-visibility: hidden; -webkit-font-smoothing: subpixel-antialiased; }
    .rotate-container:hover .rotate-box, .rotate-container.hover .rotate-box{ -webkit-transform: rotateY(180deg); -moz-transform: rotateY(180deg); -o-transform: rotateY(180deg); transform: rotateY(180deg); }
    .rotate-container.hover1:hover .rotate-box, .rotate-container.hover1.hover .rotate-box{ -webkit-transform: rotateY(-180deg); -moz-transform: rotateY(-180deg); -o-transform: rotateY(-180deg); transform: rotateY(-180deg); }
    .rotate-container.hover2:hover .rotate-box, .rotate-container.hover2.hover .rotate-box{ -webkit-transform: rotateX(180deg); -moz-transform: rotateX(180deg); -o-transform: rotateX(180deg); transform: rotateX(180deg); }
    .rotate-container.hover3:hover .rotate-box, .rotate-container.hover3.hover .rotate-box{ -webkit-transform: rotateX(-180deg); -moz-transform: rotateX(-180deg); -o-transform: rotateX(-180deg); transform: rotateX(-180deg); }
    .rotate-container.hover2 .back, .rotate-container.hover3 .back{ -webkit-transform: rotateX(-180deg); -moz-transform: rotateX(-180deg); -o-transform: rotateX(-180deg); transform: rotateX(-180deg); }
</style>

@endsection

@section('content')

@include('frontend.app.slider')   

<div class="container mt-40 mb-40">
    <div class="row">
        <div class="col-md-6">
            <h6 class="colored fs-11 ls-6 uppercase  t-center">Ondance Studio</h6>
            <h1 class="lh-40 font-sedgwick mt-10  t-center">
                Slogan Gelecek
            </h1>
            <p class="light fs-20 gray7 lh-35 mt-30">
               {!!$About->short!!}
            </p>
        </div>

        <div class="col-md-6">
           
        </div>
    </div>
</div>

<section id="blog" class="blog bb-1 b-gray2 post-radius post-shadow lh-lg py-50">
    <div class="t-center">


        <div class="col t-center">
            <h2 class="lh-45 mt-10 uppercase animate" data-animation="fadeInDown" data-animation-delay="500">Eğitimlerimiz</h2>
        </div>
       
    </div>
    <div class="container mt-50">
        <div id="blog-posts" class="blog-posts grid">
            @foreach ($Service->where('category', 1) as $item)
            <figure id="post_0{{ $item->id}}" class="post cbp-item"  style="width: 32%; left: 0px; top: 0px;">
                <div class="cbp-item-wrapper">
                    <figcaption>
                        <div class="cbp-caption">
                            <a href="{{ route('service', $item->slug)}}" class="cbp-caption-defaultWrap">
                                <img src="https://www.on.dance/assets/img/egitimler.jpg" alt="{{ $item->title}} - Karşıyaka Yolo Studio">
                            </a>
                        </div>
                        <a href="{{ route('service', $item->slug)}}" class="post-details" alt="{{ $item->title}} - İzmir On Dance Studio">
                            <div class="d-flex justify-content-between">    
                                <h4 class="post-title">
                                    {{ $item->title}}
                                </h4>
                            
                                <span class="badge badge-success">
                                    {{ $item->short }}
                                </p>
                            </div>
                        </a>
                    </figcaption>
                </div>
            </figure>
            @endforeach
        </div>
    </div>
</section>  


<section id="portfolio-grid" class="pb-60 pt-50 bt-1 b-gray1 b-solid lightbox_gallery">
    <div class="container-fluid bg-dark">
  
        <div id="gallery-items" class="lightbox_gallery">
            @foreach ($Gallery->getMedia('gallery') as $item)
                <a href="{{ $item->getFirstMediaUrl('gallery', 'img') }}" class="cbp-item has-overlay-hover scale-hover-container">
                    <div class="work-image">
                        <img src="{{ $item->getFirstMediaUrl('gallery', 'thumb') }}" class="img-fluid" alt="İzmir Karşıyaka - ON DANCE Studyo"/>
                    </div>
                    <div class="zi-5 overlay-hover slow bg-blur bg-soft-dark5 flex-column t-center">
                        <i class="ti-more white fs-22"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>


@endsection
@section('customJS')
<script src="/front/js/revolutionslider/jquery.themepunch.revolution.min.js"></script>
<script src="/front/js/revolutionslider/jquery.themepunch.tools.min.js"></script>
<script>

    var tpj=jQuery;
    var revapi1014;
    tpj(document).ready(function() {
    if(tpj("#rev_slider_1014_1").revolution == undefined){
    revslider_showDoubleJqueryError("#rev_slider_1014_1");
    }else{
    revapi1014 = tpj("#rev_slider_1014_1").show().revolution({
        sliderType:"standard",
    jsFileLocation:"revolution/js/",
        sliderLayout:"fullwidth",
        dottedOverlay:"none",
        delay:9000,
        navigation: {
            keyboardNavigation:"off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation:"off",
            mouseScrollReverse:"default",
            onHoverStop:"off",
            touch:{
                touchenabled:"on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
            }
            ,
            arrows: {
                style:"uranus",
                enable:true,
                hide_onmobile:true,
                hide_under:768,
                hide_onleave:false,
                tmp:'',
                left: {
                    h_align:"left",
                    v_align:"center",
                    h_offset:20,
                    v_offset:0
                },
                right: {
                    h_align:"right",
                    v_align:"center",
                    h_offset:20,
                    v_offset:0
                }
            }
        },
        responsiveLevels:[1240,1024,778,480],
        visibilityLevels:[1240,1024,778,480],
        gridwidth:[1240,1024,778,480],
        gridheight:[868,768,960,600],
        lazyType:"none",
        shadow:0,
        spinner:"off",
        stopLoop:"on",
        stopAfterLoops:0,
        stopAtSlide:1,
        shuffle:"off",
        autoHeight:"off",
        fullScreenAutoWidth:"off",
        fullScreenAlignForce:"off",
        fullScreenOffsetContainer: "",
        fullScreenOffset: "0px",
        disableProgressBar:"on",
        hideThumbsOnMobile:"off",
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        debugMode:false,
        fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
        }
    });
    }

    RsTypewriterAddOn(tpj, revapi1014);
    });

</script>

<script>
    $(document).ready(function(){
        "use strict";
        $('#filtered-slider').on('init', function(event, slick){
            $(".filter-button").each(function(){
                var filterName = $('.filter-button').attr('data-category');
                $("#filtered-slider").find('.' + filterName).parents(".slick-slide").addClass(filterName);
            });
        });
        $('#filtered-slider').slick();
        var filtered = false;
        $('.filter-button').on('click', function(){
            var filterClass = $(this).attr('data-category'),
                text = $(this).attr('data-filter-text'), showAllText = $(this).attr("data-show-all-text");
            if (filtered === false) {
                $('#filtered-slider').slick('slickFilter', '.' + filterClass);
                $(this).addClass("active").find(".button-text").html(showAllText);
                filtered = true;
            } else {
                $('#filtered-slider').slick('slickUnfilter');
                $(this).removeClass("active").find(".button-text").html(text);
                filtered = false;
            }
        });
    });
</script>

<script>
    (function($, window, document, undefined) {
        'use strict';
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

        $(".cbp-filter-item-active").addClass("active");
        $("[data-filter]").on("click", function(){
            $("[data-filter]").removeClass("active");
            $(".cbp-filter-item-active").addClass("active");
        });

    })(jQuery, window, document);
</script>



<script>
    $(".rotate-container").each(function {
        $(body).on('touch touchmove', function{
            $('.rotate-container').removeClass('hover');
        })
        $(this).on('touchstart', function(){
            $(this).toggleClass('hover');
        });
    });
    
</script>

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