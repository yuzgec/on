@extends('frontend.app.master')
@section('content')

<section id="home" class="relative bg-dark height-25vh mnh-250 align-items-center d-flex">
    <div class="container-md">
        <div class="t-center">
        
            <div class="container-md mt-30">
                <div class="t-center">
                    <h5 class="fs-11 ls-4 semibold white uppercase">ON DANCE STORE</h5>
                    <h1 class="mt-15 lh-md white">Ödeme </h1>
        
                    <div  
                        class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center text-white">
                        <a href="{{ route('home')}}"> <i class="ti-home"></i> </a>
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

                    <div class="col-lg-8 col-12">
                        <div class="row justify-content-center">
                            <div class="col-9 pt-70 pb-120">
                                <form method="post" action="{{route('pay')}}">
                                   @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="fs-18 uppercase gray9">İLETİŞİM BİLGİLERİ</h4>
                                        </div>

                                        <div class="col-6 pr-0 pr-15-sm mt-30">
                                            <div class="label-animation b-gray3">
                                                <input type="text" name="firstname" class="input py-15 bg-gray2">
                                                <label for="firstname" class="fs-13 gray7"><span>Adınız </span></label>
                                            </div>
                                        </div>
                                     
                                        <div class="col-6 mt-30">
                                            <div class="label-animation b-gray3">
                                                <input type="text" name="surname" class="input py-15 bg-gray2">
                                                <label for="surname" class="fs-13 gray7"><span>Soyadınız</span></label>
                                            </div>
                                        </div>

                                        <div class="col-6 mt-30">
                                            <div class="label-animation b-gray3">
                                                <input type="text" name="email" id="q-email"  class="input py-15 bg-gray2">
                                                <label for="q-email" class="fs-13 gray7"><span>E-Mail Adresiniz</span></label>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-30">
                                            <div class="label-animation b-gray3">
                                                <input type="text" name="phone" class="input py-15 bg-gray2">
                                                <label for="phone" class="fs-13 gray7"><span>Telefon</span></label>
                                            </div>
                                        </div>

                                 
                                        <div class="col-12 mt-15">
                                            <div class="label-animation b-gray2 textarea-wrapper" data-animation="fadeInUp" data-animation-delay="200">
                                                <textarea name="address" class="input py-20 bg-gray2 height-100"></textarea>
                                                <label for="address" class="fs-13 gray7"><span>Açık Adresiniz</span></label>
                                            </div>
                                        </div>
                                                
                                        <div class="col-6 pr-0 pr-15-sm mt-15">
                                            <div class="label-animation b-gray3">
                                                <label for="address" class="fs-13 gray7"><span>İl Seçiniz</span></label>

                                                <select name="province" required="" class="input c-pointer slow-sm gray7 bg-gray1 bg-gray2-hover">
                                                    <option value="">İl Seçiniz</option>
                                                    <option value="İzmir">İzmir</option>
                                                    <option value="İstanbul">İstanbul</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-6 mt-15">
                                            <div class="label-animation b-gray3">
                                                <input type="text" name="city" class="input py-15 bg-gray2">
                                                <label for="phone" class="fs-13 gray7"><span>İlçe</span></label>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-70">
                                            <h4 class="fs-18 uppercase gray9">ÖDEME TİPİ</h4>
                                        </div>

                                        <div class="col-12 mt-30">
                                            <div class="bg-gray2 py-15 px-20">
                                                <input id="paypal" name="payment" type="radio" checked="checked" class="check width-0 height-0 opacity-0 p-0"/>
                                                <label for="paypal" class="d-inline-flex align-items-center justify-content-start c-pointer mb-0">
                                                    <span class="uncheck d-flex align-items-center justify-content-center width-16 height-16 bg-white b-1 b-gray3 relative">
                                                        <span class="checked width-8 height-8 bg-dark2"></span>
                                                    </span>
                                                    <span class="fs-13 fs-12-sm gray6 ml-15 unselectable">Kredi Kartı İle</span>
                                                </label>
                                            </div>
                                        </div>
                                     
                                        <div class="col-12 mt-15">
                                            <div class="label-animation b-gray2 textarea-wrapper" data-animation="fadeInUp" data-animation-delay="200">
                                                <textarea name="message" id="message" class="input py-20 bg-gray2 height-100"></textarea>
                                                <label for="message" class="fs-13 gray7"><span>Sipariş ile ilgili notunuz</span></label>
                                            </div>
                                        </div>
                                    </div>

                                <div class="mt-30 pt-45 bt-1 b-gray1">
                                    <p class="fs-13 gray6 lh-20">
                                        Your personal data will be used to process your orders and for your experience on this website. For more information, you can read our <a href="pages-privacy.html" class="colored underline-hover">privacy policy.</a>
                                    </p>
                                    <div class="mt-15">
                                        <!-- Invisible input -->
                                        <input id="terms" name="terms" type="checkbox" checked="checked" class="check width-0 height-0 opacity-0 p-0"/>
                                       
                                        <label for="terms" class="d-inline-flex align-items-center justify-content-start c-pointer mb-0">
                                            <!-- Uncheck view -->
                                            <span class="uncheck d-flex align-items-center justify-content-center width-16 height-16 bg-white b-1 b-gray3 relative">
                                                <!-- Checked view -->
                                                <span class="checked width-8 height-8 bg-dark2"></span>
                                            </span>
                                            <!-- Label text -->
                                            <span class="fs-13 fs-12-sm gray6 ml-15 unselectable">I have read and accept the <a href="pages-terms.html" class="colored underline-hover">terms and conditions</a> on this website.</span>
                                        </label>
                                        <!-- End label -->
                                    </div>

                                    <div class="mt-50">
                                        <button class="xl-btn d-flex align-items-center justify-content-center fullwidth bg-gray8 bg-dark3-hover slow white t-center">
                                            <span class="uppercase white fs-13 ls-3 medium">ÖDEME YAP</span>
                                        </button>
                                    </div>
                                </div>
                                   <!-- End row for cols -->
                                </form>
                                <!-- End all form -->

                            </div>
                            <!-- End centered column for form -->

                        </div>
                        <!-- End row for centered form -->
                    </div>
                    <!-- End column for forms -->




                    <!-- Order summary -->
                    <div class="col-lg-4 col-12 bl-1 bl-0-sm b-gray1">

                        <!-- Row for summary column -->
                        <div class="row justify-content-center">

                            <!-- Summary column -->
                            <div class="col-10 pt-70">
                                
                                <!-- Title -->
                                <h4 class="fs-15 uppercase gray9">Sepetim</h4>

                                <!-- Products -->
                                <div class="mt-20">

                                    @foreach(Cart::instance('shopping')->content() as $cart)
                                    <div class="py-20 bb-1 b-gray1 d-flex justify-content-between flex-row">
                                        <div class="d-flex row-eq-height justify-centent-between">
                                            <div class="width-50 height-50" data-bg="url({{$cart->options->image}})"></div>
                                            <div class="py-5 pl-15 d-flex flex-column align-items-between">
                                                <div class="mb-auto">
                                                    <h4 class="fs-15 uppercase dark">
                                                       {{ $cart->name}}
                                                    </h4>
                                                    <p class="mt-3 fs-14 gray5">
                                                        {{ $cart->options->category}}
                                                    </p>
                                                </div>
                                    
                                                <div class="mt-auto">
                                                    <p class="fs-14 gray5">
                                                        
                                                    </p>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="d-flex flex-column align-items-end justify-centent-end ml-auto py-5 t-right">
                                       
                                            <p class="mt-auto fs-14 medium dark1">
                                                {{ money($cart->price)}}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <!-- End products -->

{{-- 
                                <!-- Title -->
                                <h4 class="mt-50 fs-15 uppercase gray9">Gift Card / Discount Code</h4>


                                <!-- Discount Form -->
                                <form id="checkout_form_01" class="validate-me" name="checkout_form_01" method="post" action="php/mail.php" data-error-message="Discount error message here." data-submit-message="Successful discount message here.">

                                    <!-- Input and button -->
                                    <div class="label-animation b-gray3 mt-25">
                                        <input type="text" name="email" id="email" required class="input py-15 bg-white b-gray1">
                                        <label for="email" class="fs-13 gray7"><span>Enter your code</span></label>
                                        <button type="button" class="absolute zi-5 top-0 right-10 d-inline-flex align-items-center fullheight bg-transparent">
                                            <i class="ti-arrow-right gray5"></i>
                                        </button>
                                    </div>
                                    <!-- End input and button -->

                                </form>
                                <!-- End discount form Form --> --}}



                                <!-- Subtotal price and shipping notes -->
                                <div class="mt-65">
                                    <!-- Subtotal -->
                                    <div class="d-flex fullwidth justify-content-between align-items-start">
                                        <h4 class="fs-15 uppercase gray9">Ara Toplam</h4>
                                        <p class="ml-auto fs-14 gray5">{{ money(Cart::instance('shopping')->subtotal())}}</p>
                                    </div>
                                    <!-- Shipping -->
                                    <div class="d-flex fullwidth mt-30 justify-content-between align-items-start">
                                        <h4 class="fs-15 uppercase gray9">Kargo</h4>
                                        <p class="ml-auto fs-14 gray5">Ücretsiz</p>
                                    </div>
                                </div>
                                <!-- End subtotal and shipping notes -->


                                <!-- Total price -->
                                <div class="mt-45 pt-45 bt-1 b-gray1">
                                    <!-- Subtotal -->
                                    <div class="d-flex fullwidth justify-content-between align-items-start">
                                        <h4 class="fs-15 uppercase gray9">Toplam</h4>
                                        <p class="ml-auto fs-28 dark1">{{ money(Cart::instance('shopping')->total())}}</p>
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection