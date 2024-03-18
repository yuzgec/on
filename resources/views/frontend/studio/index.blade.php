@extends('frontend.app.master')
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
               Hizmetlerimiz
            </h1>

            <div
                class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center">
                <a href="{{ route('home')}}">
                    <i class="ti-home"></i>
                </a>
                <i class="ti-angle-right fs-7 mx-15"></i>
                <a href="{{ route('home')}}" title="Anasayfa">Anasayfa</a>
                <i class="ti-angle-right fs-7 mx-15"></i>
                <a href="#" title="Hizmetlerimiz"  class="stay c-default opacity-7">Hizmetlerimiz</a>
            </div>

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