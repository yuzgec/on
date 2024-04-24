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
                        <div class="d-flex row-eq-height justify-centent-between">
                            <div class="width-50 height-50" data-bg="url({{$cart->options->image}})"></div>
                            <div class="py-5 pl-15 d-flex flex-column align-items-between">
                                <div class="mb-auto">
                                    <h4 class="fs-15 uppercase dark">
                                       {{ $cart->name}}
                                    </h4>
                                    <p class="mt-3 fs-14 gray5">
                                        {{ $cart->options->category}} 
                                        <strong> 
                                            {{ $cart->options->size ? '- Beden : '.$cart->options->size  : null}} 
                                            {{ $cart->options->student ? '- Katılımcı : '.$cart->options->student  : null}}
                                        </strong>
                                    </p>
                                </div>
                    
                                <div class="mt-auto">
                                    <p class="fs-14 gray5">
                                        
                                    </p>
                                </div>
                            </div> 
                        </div>
                        <div class="d-flex flex-column align-items-end justify-centent-end ml-auto py-5 t-right">
                            <form id="form" method="post" action="{{route('cartdelete',$cart->rowId )}}">
                                @csrf
                                <a href="javascript:{}" onclick="document.getElementById('form').submit()" class="bg-transparent" aria-label="button">
                                    <i class="ti-close fs-16 black"></i>
                                </a>
                            </form>
                         

                            <p class="mt-auto fs-14 medium dark1">
                                {{ money($cart->price)}}
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

                <div class="d-flex fullwidth justify-centent-between">
                    <h5 class="fs-14 gray5">
                        KDV %20
                    </h5>
                    <p class="ml-auto fs-16 gray5">
                       {{ Cart::instance('shopping')->tax()}}
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
