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
          <h5 class="fs-11 ls-4 semibold white uppercase"> ONDANCE STUDIO - #burasiizmir </h5>
          <h1 class="mt-15 font-secondary lh-md"> {{ $Detay->title }}</h1>
          <div class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center">
             <a href="index.html"><i class="ti-home"></i></a>Anasayfa<i class="ti-angle-right fs-7 mx-15"></i> 
             <a href="#">Kurumsal</a> <i class="ti-angle-right fs-7 mx-15"></i> 
             <a href="#" class="stay c-default opacity-7">{{ $Detay->title }}</a> </div>
       </div>
    </div>
 </section>
<div id="elementDescription" class="container py-100 py-100-sm">

    <span class="fs-20 fs-16-sm gray7 ls-0 lh-35 light">
        {!! $Detay->desc !!}
    </span>

</div>

<section id="service-boxes-02" class="pt-30 pb-60 bg-gray2 bt-1 b-gray1">
    <div class="container">

        <div class="col t-center">
            <h2 class="lh-45 mt-10 uppercase">Eğitimlerimiz</h2>
        </div>

        <div class="row t-left t-center-sm align-items-center">

           
            @foreach ($Service->where('category', 1) as $item)
            <div class="col-lg-4 col-12 mt-30 perspective-lg relative zi-hover">
                <div class="bg-white bs-lg-hover dark2 slow c-default py-40 px-40">
                    <h5 class="fs-18 medium mt-25">
                        <a href="{{ route('service', $item->slug)}}" title="{{ $item->title}}">
                            {{ $item->title}}
                        </a>
                    </h5>
                    <p class="fs-16 lh-25 mt-15 light">
                        In sit amet posuere felis. Suspendisse finibus viverra justo eget ullamcorper.
                    </p>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
@endsection