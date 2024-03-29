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

                    <div class="py-20 bb-1 b-gray1 d-flex justify-content-between flex-row">
                        <!-- Image and title -->
                        <div class="d-flex row-eq-height justify-centent-between">
                            <!-- Product image in lazy & cover background -->
                            <div class="width-100 height-100" data-bg="url(images/shop/lyra/product_03.jpg)"></div>
                            <!-- Titles and price -->
                            <div class="py-5 pl-15 d-flex flex-column align-items-between">
                                <!-- Titles -->
                                <div class="mb-auto">
                                    <!-- Product title -->
                                    <h4 class="fs-15 uppercase dark">
                                        Broadway Perfume
                                    </h4>
                                    <!-- Product subtitle -->
                                    <p class="mt-3 fs-14 gray5">
                                        Cosmetics
                                    </p>
                                </div>
                                <!-- End titles -->
                                <!-- Product model -->
                                <div class="mt-auto">
                                    <p class="fs-14 gray5">
                                        Golden
                                    </p>
                                </div>
                            </div>
                            <!-- End titles and detail -->
                        </div>
                        <!-- End image and title -->
                        <!-- Close button and price -->
                        <div class="d-flex flex-column align-items-end justify-centent-end ml-auto py-5 t-right">
                            <!-- Close button -->
                            <button type="button" class="bg-transparent">
                                <i class="ti-close fs-16 black"></i>
                            </button>
                            <!-- Price -->
                            <p class="mt-auto fs-14 medium dark1">
                                $32.40
                            </p>
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
