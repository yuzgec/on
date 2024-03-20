<section id="home" class="relative white height-100vh height-60vh-sm mnh-450 align-items-center d-flex">
    <div class="zi-2 fai pointer-events-none unselectable">
          <svg width="100%" height="100%" viewBox="0 0 1920 1080" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="none">
               <defs>
                    <linearGradient x1="100%" y1="34.1796875%" x2="0%" y2="65.8203125%" id="linearGradient-eouu7xzkv0-1">
                         <stop stop-color="#867C78" stop-opacity="0.052229021" offset="0%"></stop>
                         <stop stop-color="#4E4643" stop-opacity="0.489483173" offset="100%"></stop>
                    </linearGradient>
               </defs>
               <g stroke="none" stroke-width="1" fill="url(#linearGradient-eouu7xzkv0-1)" fill-rule="evenodd">
                    <rect x="0" y="0" width="100%" height="100%"></rect>
               </g>
          </svg>
    </div>
     <div class="videobg bg-soft bg-soft-dark2">
          <video  playsinline autoplay muted loop>
               <source src="/ondance.mp4" type="video/mp4">
          </video>
     </div>
     <div class="container relative zi-5">
          <div class="t-left mt-25">
               <h5 class="fs-16 white uppercase y">
                   ON DANCE - İZMİR
               </h5>
               <h2 class="mt-15 fs--lg mxw-600 lh-sm mt-15  uppercase t-left">
                    {{ config('settings.slider1')}}<span class="colored1"> {{ config('settings.slider2')}}</span>
                    {{ config('settings.slider3')}}
               </h2>
               <p class="mt-30 mt-15-sm fs-20 fs-14-sm lh-35 lh-25-sm light mxw-650">
                    {{ config('settings.slider4')}}
               </p>
               <div class="mt-50 mt-15-sm">
                    <a href="{{ route('contactus')}}" class="lg-btn py-15-sm fs-12-sm b-1 b-white white dark-hover bg-transparent bg-white-hover uppercase normal fs-14">
                        İletişime Geç
                    </a>
               </div>
          </div>
     </div>
</section>