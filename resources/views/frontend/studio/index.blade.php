@extends('frontend.app.master')
@section('content')

<section id="home" class="relative white height-80vh height-60vh-sm mnh-450 align-items-center d-flex">
    <div class="videobg bg-soft bg-soft-dark5 loaded" data-background="images/videos/video-2-poster.jpg" style="background-image: url();">
       <video poster="images/videos/video-2-poster.jpg" playsinline="" autoplay="true" muted="" loop="true">
          <source src="/ondance.mp4" type="video/mp4">
       </video>
    </div>
    <div class="container-md">
       <div class="t-center mt-25">
          <h5 class="fs-11 ls-4 semibold white"> ON DANCE STUDIO - #burasiizmir </h5>
          <h1 class="mt-15 font-secondary lh-md"> Stüdyolarımız</h1>
          <div class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center">
             <a href="{{ route('home')}}"><i class="ti-home"></i></a>Anasayfa<i class="ti-angle-right fs-7 mx-15"></i> 
             <a href="#" class="stay c-default opacity-7">Stüdyolarımız</a> </div>
       </div>
    </div>
</section>

<section id="service-boxes-02" class="pt-90 pb-120 bg-gray2 bt-1 b-gray1">
    <div class="container">
        <div class="row t-left t-center-sm align-items-center">
            @foreach ($Service as $item)
            <div class="col-lg-4 col-12 mt-30 perspective-lg relative zi-hover">
                <div class="bg-white bs-lg-hover dark2 slow c-default py-40 px-40">
                    <div class="fs-45 mt-150">
                        <img src="/logo.jpg" alt="{{ $item->title}}" class="" width="30px">
                    </div>
                    <h5 class="fs-18 medium mt-25">
                        <a href="{{ route('servicedetail', $item->slug)}}" title="{{ $item->title}}">
                            {{ $item->title}}
                        </a>
                    </h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection