<nav id="navigation" class="modern-nav fixed bordered link-hover-01 hover-dark nav-dark dropdown-radius" data-offset="54">
    <div class="container nav-container">
        <div class="row nav-wrapper justify-content-end">
            <div class="col">
                <a href="{{ route('home')}}" class="logo">
                    <img src="/logo.png" alt="Karşıyaka On Dance Kursu" class="logo-white mxw-100">
                </a>
            </div>
            <div class="col ml-auto nav-menu">
                <ul class="nav-links justify-content-end">
                    <li class="logo-for-mobile-navigation"><img src="/logob.png" alt="İzmir On Dance Dans Okulu" class="logo-white mxw-100"></li>
                    <li><a href="{{ route('home')}}" class="nav-link">Anasayfa</a></li>

                    <li class="dd-toggle"> <a href="#" class="nav-link">Kurumsal</a>
                        <ul class="dropdown-menu to-right">
                            <li><a href="{{ route('corporatedetail', 'hakkimizda')}}" class="nav-link">Hakkımızda</a></li>
                            <li><a href="{{ route('management')}}" class="nav-link">Yönetim</a></li>
                        </ul> 
                    </li>       

                    <li class="dd-toggle"> <a href="#" class="nav-link">Stüdyolar</a>
                        <ul class="dropdown-menu to-right">
                            @foreach ($Service->where('category',2) as $item) 
                                <li><a href="{{ route('studio', $item->slug)}}" class="nav-link">{{ $item->title }}</a></li>
                            @endforeach
                        </ul> 
                    </li>

                    <li class="dd-toggle"> <a href="#" class="nav-link">Eğitimler</a>
                        <ul class="dropdown-menu to-right">
                            @foreach ($Service->where('category',1) as $item) 
                                <li><a href="{{ route('service', $item->slug)}}" class="nav-link">{{ $item->title }}</a></li>
                            @endforeach
                        </ul> 
                    </li>
                    <li class="dd-toggle"> <a href="#" class="nav-link">Eğitmenler</a>
                        <ul class="dropdown-menu to-right">
                            @foreach ($Service->where('category',4) as $item) 
                                <li><a href="{{ route('dancer', $item->slug)}}" class="nav-link">{{ $item->title }}</a></li>
                            @endforeach
                        </ul> 
                    </li>
                    <li><a href="{{ route('events')}}" class="nav-link">Etkinlikler</a></li>
                    <li><a href="{{ route('production', 'produksiyon')}}" class="nav-link">Prodüksiyon</a></li>
                    <li><a href="{{ route('store')}}" class="nav-link">Store</a></li>
                    <li><a href="{{ route('contactus')}}" class="nav-link">İletişim</a></li>
                    <li class="punch-nav-trigger mt-30-sm">
                         <div class="hamburger-menu">
                             <div class="top-bun"></div>
                             <div class="meat"></div>
                             <div class="bottom-bun"></div>
                         </div>
                    </li>
                </ul>
            </div>

            <div class="d-none d-lg-block nav-menu">
                <ul class="nav-links justify-content-end">
                    <li class="extra-links">
                        <div class="bracket"></div>
                        <a href="https://www.instagram.com/{{ config('settings.instagram')}}" target="_blank" class="nav-link" title="Instagram"><i class="ti-instagram"></i></a>
                        <a href="https://www.youtube.com/{{ config('settings.youtube')}}" target="_blank" class="nav-link" title="youtube"><i class="ti-youtube"></i></a>
                        <a href="https://www.tiktok.com/{{ config('settings.tiktok')}}" target="_blank" class="nav-link" title="tiktok"><img src="/tiktok.svg"/></a>
                        <a href="#" class="nav-link cart-trigger mr-10"> <i class="ti-bag fs-13 relative"> <span class="circle width-10 height-10 bg-colored absolute left-percent-90 bottom-percent-90"></span> </i> </a>
                        <button class="sidebar-button md-btn bg-colored bg-colored1-hover white fs-11 bold uppercase slow-sm radius-sm" title="Bilgi Al"><span>Bilgi Al</span></button>

                    </li>
                </ul>
            </div>

            <div class="mobile-nb">
                <div class="hamburger-menu">
                    <div class="top-bun"></div>
                    <div class="meat"></div>
                    <div class="bottom-bun"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-nav-bg"></div>
 </nav>

 <nav id="punch-nav" class="punch-nav">
    <div class="container-fluid">
       <div class="row">
           <div class="col-12 absolute height-100 px-50 px-15-sm left-0 top-0 zi-5 d-flex align-items-center animate" data-animation="fadeIn" data-animation-delay="700">
               <div class="row fullwidth mx-0">
                   <div class="col d-flex justify-content-start align-items-center">
                        <img src="/logob.png" alt="ON DANCE - İZMİR KARŞIYAKA DANS STÜDYOSU" class="logo-white mxw-100" title="KARŞIYAKA DANS OKULU - DANS EĞİTİMİ">
                   </div>
                   <div class="col d-flex justify-content-end align-items-center">
                       <a href="#" class="close block">
                           <svg width="33px" height="31px" viewBox="0 0 33 31" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                   <path class="visible-lg" d="M31.5693018,0.430698159 L1.36523438,30.6347656" stroke="#FFFFFF" transform="translate(16.500000, 15.500000) rotate(-270.000000) translate(-16.500000, -15.500000) "></path>
                                   <path class="visible-lg" d="M31.5693018,0.430698159 L1.36523438,30.6347656" stroke="#FFFFFF" transform="translate(16.500000, 15.500000) rotate(-180.000000) translate(-16.500000, -15.500000) "></path>
                                   <path class="hidden-lg" d="M31.5693018,0.430698159 L1.36523438,30.6347656" stroke="#000000" transform="translate(16.500000, 15.500000) rotate(-270.000000) translate(-16.500000, -15.500000) "></path>
                                   <path class="hidden-lg" d="M31.5693018,0.430698159 L1.36523438,30.6347656" stroke="#000000" transform="translate(16.500000, 15.500000) rotate(-180.000000) translate(-16.500000, -15.500000) "></path>
                               </g>
                           </svg>
                       </a>
                   </div>
               </div>
           </div>
           <div class="col-lg-8 col-12 pt-100-sm punch-nav-col bg-white d-flex flex-wrap align-items-center">
               <div class="t-left">
                   <ul class="d-flex flex-wrap m-0 block-links fs-24 light black lh-md">
                       <li><a href="{{ route('home')}}" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="800">Anasayfa</a></li>
                       <li><a href="{{ route('corporatedetail', 'hakkimizda')}}" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="900">Hakkımızda</a></li>
                       <li><a href="{{ route('studios')}}" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="1000">Stüdyolar</a></li>
                       <li><a href="{{ route('services')}}" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="1100">Eğitimler</a></li>
                       <li><a href="{{ route('blog')}}" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="1200">Blog</a></li>
                       <li><a href="{{ route('contactus')}}" class="underline-hover-slide underline-slide mt-30 animate" data-animation="fadeInDown" data-animation-delay="1300">İletişim</a></li>
                   </ul>
                   <div class="t-left animate mt-70 pb-50-sm" data-animation="fadeIn" data-animation-delay="1300">
                       <h4 class="fs-24 fs-18-sm gray7 light" >Eğitimlerimiz hakkında bilgi alın.</h4>
                       <a href="mailto:{{ config('settings.email1')}}" class="inline-block mt-5 light fs-36 lh-50 fs-24-sm dark3 underline-hover-slide underline-slide">{{ config('settings.email1')}}</a>
                       <div class="row pt-10 gray6 fs-22 fs-18-sm lh-35 lh-30-sm light">
                           <div class="col-lg-4 col-12 mt-30 pl-0">
                               <h5 class="fs-16 dark3 normal mb-10">İzmir - Karşıyaka</h5>
                               <address class="m-0">{{ config('settings.adres2')}}</address>
                           </div>
                           
                       </div>
                       <div class="mt-70">
                           <ul class="d-flex m-0">
                               <li><a href="#" target="_blank" class="underline-slide underline-gray fs-16 gray5 lh-25 mr-20 inline-block">Whatsapp</a></li>
                               <li><a href="{{ config('settings.tiktok')}}" target="_blank" class="underline-slide underline-gray fs-16 gray5 lh-25 mr-20 inline-block">Tiktok</a></li>
                               <li><a href="{{ config('settings.instagram')}}" target="_blank" class="underline-slide underline-gray fs-16 gray5 lh-25 mr-20 inline-block">Instagram</a></li>
                               <li><a href="{{ config('settings.youtube')}}" target="_blank" class="underline-slide underline-gray fs-16 gray5 lh-25 mr-20 inline-block">Youtube</a></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-lg-4 col-12 punch-nav-col bg-black d-flex align-items-center justify-content-center">
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12493.72722695332!2d27.0914394!3d38.477677!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbd9e96a284e45%3A0xad66083181d61a69!2sON%20Dance!5e0!3m2!1str!2str!4v1710775961772!5m2!1str!2str"
                width="100%"
                height="750px"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>       
           </div>
       </div>
    </div>
</nav>

@include('frontend.app.cart')