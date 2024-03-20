@extends('frontend.app.master')
@section('content')

<section id="home" class="relative white height-60vh height-60vh-sm mnh-450 align-items-center d-flex">
    <div class="videobg bg-soft bg-soft-dark5 loaded" data-background="images/videos/video-2-poster.jpg" style="background-image: url();">
       <video poster="images/videos/video-2-poster.jpg" playsinline="" autoplay="true" muted="" loop="true">
          <source src="/ondance.mp4" type="video/mp4">
       </video>
    </div>
    <div class="container-md">
       <div class="t-center mt-25">
          <h5 class="fs-11 ls-4 semibold white"> ON DANCE - #burasıizmir </h5>
          <h1 class="mt-15 font-secondary lh-md"> {{ $Detay->title}}</h1>
          <div class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center">
             <a href="{{ route('home')}}"><i class="ti-home"></i></a>Anasayfa <i class="ti-angle-right fs-7 mx-15"></i> 
             <a href="{{ route('studios')}}" class="stay c-default opacity-7">Etkinlikler</a> </div>
             <a href="#" class="stay c-default opacity-7">{{ $Detay->title}}</a> </div>
       </div>
    </div>
 </section>

<section id="home" class="fullwidth bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 pt-50">
                @if (!$Detay->getFirstMediaUrl('page'))
                    <img src="{{ $Detay->getFirstMediaUrl('page', 'img')}}" alt="ON DANCE - {{ $Detay->title}}" class="img-fluid mb-30" />
                @endif
                <span class="fs-20 fs-16-sm gray7 ls-0 lh-35 light">
                    {!! $Detay->desc !!}
                </span>
            </div>
        </div>
    </div>
</section>


<section id="portfolio-grid" class="pb-60 pt-50 bt-1 b-gray1 b-solid lightbox_gallery">
    <div class="container ">
        <div id="gallery-items" class="lightbox_gallery">
            @foreach ($Detay->getMedia('gallery') as $item)
                <a href="{{ $item->getUrl('img') }}" class="cbp-item has-overlay-hover scale-hover-container">
                    <div class="work-image">
                        <img src="{{ $item->getUrl('thumb') }}" class="img-fluid" alt="İzmir Karşıyaka - ON DANCE Studyo"/>
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