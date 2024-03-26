    <div id="cart" class="cart c-default">
        <div class="px-50 px-30-sm py-50 py-30-sm fullwidth fullheight d-flex align-items-between flex-column">
            <div class="fullwidth">
                <div class="d-flex fullwidth justify-content-between align-items-center">
                    <h3 class="fs-22 dark4 t-left">
                        Sepetim
                    </h3>
                    <div class="icon-xs relative c-default">
                        <i class="ti-shopping-cart fs-20 black"></i>
                        <span class="fs-12 d-block medium absolute left-percent-90 top-0">{{ Cart::instance('shopping')->count()}}</span>
                    </div>
                </div>
                <div class="mt-30">
                    @foreach(Cart::instance('shopping')->content() as $cart)
                    <div class="py-10 bb-1 b-gray1 d-flex justify-content-between flex-lg-row flex-column">
                        <div class="d-flex fullwidth row-eq-height fullwidth justify-centent-between">
                            <div class="width-30 height-30">
                                <img src="{{ $cart->options->image }}" alt="{{ $cart->name }}" class="img-fluid">
                            </div>
                            <div class="py-10 pl-15 d-flex flex-column align-items-between">
                                <div class="mb-auto">
                                    <h4 class="fs-15 uppercase dark">
                                        {{ $cart->name }}
                                    </h4>
                                    <p class="mt-3 fs-14 gray5">
                                        {{ $cart->options->category }}
                                    </p>
                                </div>
                   
                                <div class="mt-auto">
                                    <p class="fs-14 medium dark1">
                                        {{ money($cart->price )}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-centent-lg-end justify-content-start ml-auto ml-0-sm mt-15-sm">
                            <div class="quantity d-flex align-items-center justify-content-center">
                                <input type="button" value="-" class="minus b-gray1 bg-white bg-gray2-hover dark3 fs-16 slow width-40 height-40 px-0 py-0 circle">
                                <input type="number" class="numbers width-60 height-50 px-0 py-0 t-center dark2 fs-16" step="1" min="1" max="10" name="numbers3" value="{{ $cart->qty}}" title="Products">
                                <input type="button" value="+" class="plus b-gray1 bg-white bg-gray2-hover dark3 fs-16 slow width-40 height-40 px-0 py-0 circle">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-auto d-flex fullwidth flex-column">
                <div class="d-flex fullwidth justify-centent-between">
                    <h5 class="fs-14 gray5">
                        Kargo
                    </h5>
                    <p class="ml-auto fs-16 gray5">
                        Ücretsiz
                    </p>
                </div>
                <div class="mt-20 pb-30 bb-1 b-gray1 d-flex fullwidth justify-centent-between">
                    <h5 class="fs-14 gray9">
                        Toplam 
                    </h5>
                    <p class="ml-auto fs-22 dark">
                       {{Cart::instance('shopping')->total()}}
                    </p>
                </div>
                <div class="d-flex mt-40 justify-content-lg-between align-items-start flex-lg-row flex-wrap">
                        <a href="{{ route('store')}}" class="cart-closer xl-btn d-inline-flex bg-white b-1 b-gray2 opacity-7-hover slow-sm medium fs-12 uppercase ls-1">
                           Alışverişe Devam Et
                        </a>
                        <a href="{{ route('checkout')}}" class="ml-auto ml-0-sm xl-btn mt-15-sm bg-colored2 bg-colored1-hover slow-sm white medium fs-12 uppercase ls-1">
                            Ödeme
                        </a>
                    </div>
            </div>
        </div>
    </div>
    <div class="cart-backdrop c-close-white"></div>
