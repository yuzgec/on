<nav id="navigation" class="modern-nav fixed bordered link-hover-01 hover-dark nav-dark dropdown-radius" data-offset="54">
    <div class="container nav-container">
        <div class="row nav-wrapper justify-content-end">
            <div class="col">
                <a href="{{ route('home')}}" class="logo">
                    <img src="/logo.png" alt="website logo" class="logo-white mxw-100">
                </a>
            </div>
            <div class="col ml-auto nav-menu">
                <ul class="nav-links justify-content-end">
                    <li class="logo-for-mobile-navigation"><img src="/logob.png" alt="website logo" class="logo-white mxw-100"></li>
                    <li><a href="{{ route('home')}}" class="nav-link">Anasayfa</a></li>
                    <li><a href="{{ route('corporatedetail', 'hakkimizda')}}" class="nav-link">Hakkımızda</a></li>
                    <li><a href="{{ route('studios')}}" class="nav-link">Stüdyolarımız</a></li>
                    <li class="dd-toggle"> <a href="#" class="nav-link">Eğitimler</a>
                        <ul class="dropdown-menu to-right">
                            @foreach ($Service->where('category',1) as $item) 
                                <li><a href="{{ route('service', $item->slug)}}" class="nav-link">{{ $item->title }}</a></li>
                            @endforeach
                        </ul> 
                    </li>
                    <li><a href="{{ route('team')}}" class="nav-link">Eğitmenler</a></li>
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
                        <a href="{{ route('contactus')}}" class="nav-button white bg-colored bg-colored uppercase bold slow" title="Buy Quadra"><span>Bilgi Al</span>
                        </a>
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
        <!-- End Row for cols in the nav -->
    </div>
    <!-- End Navigation container -->
    <div class="mobile-nav-bg"></div>
 </nav>


 <nav id="punch-nav" class="punch-nav">
    <!-- Container for all -->
    <div class="container-fluid">
       <!-- Row for inner elements -->
       <div class="row">
           <!-- Col for logo and close buttons -->
           <div class="col-12 absolute height-100 px-50 px-15-sm left-0 top-0 zi-5 d-flex align-items-center animate" data-animation="fadeIn" data-animation-delay="700">
               <div class="row fullwidth mx-0">
                   <!-- Logo column -->
                   <div class="col d-flex justify-content-start align-items-center">
                        <img src="content/seta/images/logo_01_dark.svg" alt="website logo" class="logo-white mxw-100" title="Quadra Premium Template">
                   </div>
                   <!-- Close SVG button -->
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
           <!-- End col for logo and close buttons -->
           <!-- Punch navigation col - links -->
           <div class="col-lg-8 col-12 pt-100-sm punch-nav-col bg-white d-flex flex-wrap align-items-center">
               <!-- Keeper for column content -->
               <div class="t-left">
                   <!-- Links -->
                   <ul class="d-flex flex-wrap m-0 block-links fs-24 light black lh-md">
                       <li><a href="index.html" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="800">Home</a></li>
                       <li><a href="#" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="900">About</a></li>
                       <li><a href="#" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="1000">Services</a></li>
                       <li><a href="#" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="1100">Team</a></li>
                       <li><a href="#" class="underline-hover-slide underline-slide mr-30 mt-30 animate" data-animation="fadeInDown" data-animation-delay="1200">Articles</a></li>
                       <li><a href="#" class="underline-hover-slide underline-slide mt-30 animate" data-animation="fadeInDown" data-animation-delay="1300">Contact</a></li>
                   </ul>
                   <!-- Keeper for content -->
                   <div class="t-left animate mt-70 pb-50-sm" data-animation="fadeIn" data-animation-delay="1300">
                       <!-- Title and mail -->
                       <h4 class="fs-24 fs-18-sm gray7 light" >Talk to us about something.</h4>
                       <a href="mailto:contact@yourwebsite.com" class="inline-block mt-5 light fs-36 lh-50 fs-24-sm dark3 underline-hover-slide underline-slide">contact@yourwebsite.com</a>
                       <!-- Address boxes -->
                       <div class="row pt-10 gray6 fs-22 fs-18-sm lh-35 lh-30-sm light">
                           <div class="col-lg-4 col-12 mt-30 pl-0">
                               <h5 class="fs-16 dark3 normal mb-10">Washington</h5>
                               <address class="m-0">3113 Massachusetts Avenue Washington DC</address>
                           </div>
                           <div class="col-lg-4 col-12 mt-30 pl-0">
                               <h5 class="fs-16 dark3 normal mb-10">Australia</h5>
                               <address class="m-0">PO Box 16122 Collins Street West Victoria 8007</address>
                           </div>
                           <div class="col-lg-4 col-12 mt-30 pl-0">
                               <h5 class="fs-16 dark3 normal mb-10">London</h5>
                               <address class="m-0">22 Kingswood Close, Solihull, B90 3ET UK</address>
                           </div>
                       </div>
                       <!-- Social buttons -->
                       <div class="mt-70">
                           <ul class="d-flex m-0">
                               <li><a href="#" target="_blank" class="underline-slide underline-gray fs-16 gray5 lh-25 mr-20 inline-block">Facebook</a></li>
                               <li><a href="#" target="_blank" class="underline-slide underline-gray fs-16 gray5 lh-25 mr-20 inline-block">Twitter</a></li>
                               <li><a href="#" target="_blank" class="underline-slide underline-gray fs-16 gray5 lh-25 mr-20 inline-block">Instagram</a></li>
                           </ul>
                       </div>
                   </div>
                   <!-- End keeper for content -->
               </div>
               <!-- End keeper for column content -->
           </div>
           <!-- End punch navigation col -->
           <!-- Punch navigation col - image -->
           <div class="col-lg-4 col-12 punch-nav-col bg-gradient d-flex align-items-center flex-wrap justify-content-center py-70">
               <!-- Keeper for content -->
               <div class="t-center">
                   <!-- Clock -->
                   <div id="myclock" class="pointer-events-none animate" data-animation="blurIn" data-animation-delay="1000"></div>
                   <h3 class="light gray6 mt-50 animate" data-animation="blurIn" data-animation-delay="1200">
                       Solve your problems in minutes, save your time.
                   </h3>
               </div>
               <!-- End keeper for content -->
           </div>
           <!-- End punch navigation col -->
       </div>
       <!-- End row for inner elements -->
    </div>
    <!-- End container for all -->
</nav>