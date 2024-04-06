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
                                            <input type="text" value="{{ old('firstname')}}" name="firstname"  placeholder="Adınız" class="bg-gray1  {{ ($errors->has('firstname')) ? 'b-danger b-2' : 'b-1 b-solid b-gray2' }}">
                                            @if($errors->has('firstname'))
                                                <span style="color:red">{{$errors->first('firstname')}}</span>
                                            @endif
                                        </div>

                                        <div class="col-6 pr-0 pr-15-sm mt-30">
                                            <input type="text" value="{{ old('surname')}}" name="surname"  placeholder="Soyadınız" class="bg-gray1  {{ ($errors->has('surname')) ? 'b-danger b-2' : 'b-1 b-solid b-gray2' }}">
                                            @if($errors->has('surname'))
                                                <span style="color:red">{{$errors->first('surname')}}</span>
                                            @endif
                                        </div>

                                        <div class="col-12 pr-0 pr-15-sm mt-30">
                                            <input type="number" value="{{ old('tckn')}}" name="tckn"  placeholder="T.C Kimlik No" class="bg-gray1  {{ ($errors->has('tckn')) ? 'b-danger b-2' : 'b-1 b-solid b-gray2' }}">
                                            @if($errors->has('tckn'))
                                                <span style="color:red">{{$errors->first('tckn')}}</span>
                                            @endif
                                        </div>

                                        <div class="col-6 pr-0 pr-15-sm mt-30">
                                            <input type="text" value="{{ old('email')}}" name="email"  placeholder="Email Adresiniz" class="bg-gray1  {{ ($errors->has('email')) ? 'b-danger b-2' : 'b-1 b-solid b-gray2' }}">
                                            @if($errors->has('email'))
                                                <span style="color:red">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>

                                        <div class="col-6 pr-0 pr-15-sm mt-30">
                                            <input type="text" value="{{ old('phone')}}" name="phone"  placeholder="Telefon Numaranız" class="bg-gray1  {{ ($errors->has('phone')) ? 'b-danger b-2' : 'b-1 b-solid b-gray2' }}">
                                            @if($errors->has('phone'))
                                                <span style="color:red">{{$errors->first('phone')}}</span>
                                            @endif
                                        </div>
                                 
                                        <div class="col-12 mt-15">
                                            <textarea type="text" name="address"  placeholder="Açık Adresiniz"  
                                            class="input bg-gray1  {{ ($errors->has('address')) ? 'b-danger b-2' : 'b-1 b-solid b-gray2' }}"></textarea>
                                            @if($errors->has('address'))
                                                <span style="color:red">{{$errors->first('address')}}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-6 mb-3 mt-10">
                                            <label class="form-label"> İl <span class="text-danger">*</span></label>
                                            <select class="input c-pointer slow-sm gray7 bg-gray1 bg-gray2-hover @if($errors->has('province')) is-invalid @endif" id="city-select" name="province">
                                                <option value="">İl Seçiniz</option>
                                                @foreach($Province as $item)
                                                    <option value="{{ $item->id }}" 
                                                        {{ (old('province') == $item->id) ? 'selected' : null }}>
                                                        {{ $item->sehir_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('province'))
                                                <div class="invalid-feedback valid">{{$errors->first('province')}}</div>
                                            @endif
                                        </div>

                                        <div class="col-md-6 mb-3 mt-10">

                                            <label class="form-label">İlçe <span class="text-danger">*</span></label>
                                                <select id="district-select" class="input c-pointer slow-sm gray7 bg-gray1 bg-gray2-hover  @if($errors->has('city')) is-invalid @endif" name="city" >
                                            </select>

                                            @if($errors->has('city'))
                                                <div class="invalid-feedback valid">{{$errors->first('city')}}</div>
                                            @endif

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
                                                <textarea name="note" id="message" class="input py-20 bg-gray2 height-100"></textarea>
                                                <label for="message" class="fs-13 gray7"><span>Sipariş ile ilgili notunuz</span></label>
                                            </div>
                                        </div>
                                    </div>

                                <div class="mt-30 pt-45 bt-1 b-gray1">
                                    <p class="fs-13 gray6 lh-20">
                                        Your personal data will be used to process your orders and for your experience on this website. For more information, you can read our <a href="pages-privacy.html" class="colored underline-hover">privacy policy.</a>
                                    </p>
                                    <div class="mt-15">
                                        <input id="terms" name="terms" type="checkbox" checked="checked" class="check width-0 height-0 opacity-0 p-0"/>                                       
                                        <label for="terms" class="d-inline-flex align-items-center justify-content-start c-pointer mb-0">
                                            <span class="uncheck d-flex align-items-center justify-content-center width-16 height-16 bg-white b-1 b-gray3 relative">
                                                <span class="checked width-8 height-8 bg-dark2"></span>
                                            </span>
                                            <span class="fs-13 fs-12-sm gray6 ml-15 unselectable">I have read and accept the <a href="pages-terms.html" class="colored underline-hover">terms and conditions</a> on this website.</span>
                                        </label>
                                    </div>

                                    <div class="mt-50">
                                        <button class="xl-btn d-flex align-items-center justify-content-center fullwidth bg-gray8 bg-dark3-hover slow white t-center">
                                            <span class="uppercase white fs-13 ls-3 medium">ÖDEME YAP</span>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 bl-1 bl-0-sm b-gray1">
                        <div class="row justify-content-center">
                            <div class="col-10 pt-70">
                                <h4 class="fs-15 uppercase gray9">Sepetim</h4>
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



                                <div class="mt-65">
                                    <div class="d-flex fullwidth justify-content-between align-items-start">
                                        <h4 class="fs-15 uppercase gray9">Ara Toplam</h4>
                                        <p class="ml-auto fs-14 gray5">{{ Cart::instance('shopping')->subtotal()}}</p>
                                    </div>
                                    <div class="d-flex fullwidth mt-30 justify-content-between align-items-start">
                                        <h4 class="fs-15 uppercase gray9">Kargo</h4>
                                        <p class="ml-auto fs-14 gray5">Ücretsiz</p>
                                    </div>
                                </div>

                                <div class="mt-45 pt-45 bt-1 b-gray1">
                                    <div class="d-flex fullwidth justify-content-between align-items-start">
                                        <h4 class="fs-15 uppercase gray9">Toplam</h4>
                                        <p class="ml-auto fs-28 dark1">{{ Cart::instance('shopping')->total()}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


@section('customJS')


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        
        $(document).ready(function() {
            $('#city-select').on('change', function() {
                var cityId = $(this).val();
                $.ajax({
                    url: '/districts/' + cityId,
                    type: 'GET',
                    success: function(districts) {
                        var districtSelect = $('#district-select');
                        districtSelect.empty();

                        $.each(districts, function(key, district) {
                            districtSelect.append($('<option></option>').attr('value', district.ilce_title).text(district.ilce_title));
                        });
                    },
                    error: function(request, status, error) {
                        console.error('AJAX Error:', error);
                    }
                });
            });
        });

    </script>
@endsection

