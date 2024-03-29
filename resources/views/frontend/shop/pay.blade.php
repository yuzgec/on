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
                        PAYTR ile Güvenli Ödeme
                    </h1>
        
                    <div
                        class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center text-white">
                        <a href="{{ route('home')}}">
                            <i class="ti-home"></i>
                        </a>
                        <i class="ti-angle-right fs-7 mx-15"></i>
                        <a href="{{ route('home')}}" title="Anasayfa">Anasayfa</a>
                        <i class="ti-angle-right fs-7 mx-15"></i>
                        <a href="{{ route('store')}}" title="Store"  class="stay c-default opacity-7">Store</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <div id="checkout" class="fullwidth">
        <div class="container-fluid">
                <div class="row row-eq-height">
                    <iframe src="https://www.paytr.com/odeme/guvenli/{{ $token }}" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
                   
             
                </div>
            </div>
        </div>
@endsection

@section('customJS')
    
@endsection