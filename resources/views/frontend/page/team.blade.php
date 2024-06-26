@extends('frontend.app.master')
@section('content')
<section id="home" class="relative white height-60vh height-60vh-sm mnh-450 align-items-center d-flex">
    <div class="videobg bg-soft bg-soft-dark5 loaded" data-background="images/videos/video-2-poster.jpg" style="background-image: url();">
       <video poster="images/videos/video-2-poster.jpg" playsinline="" autoplay="true" muted="" loop="true">
          <source src="/ondance.mp4" type="video/mp4">
       </video>
    </div>
    <div class="container-md">
       <div class="t-center mt-25">
          <h5 class="fs-11 ls-4 semibold white"> ON DANCE - #burasıizmir </h5>
          <h1 class="mt-15 font-secondary lh-md"> Eğitmenlerimiz</h1>
          <div class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center text-white">
               <a href="{{ route('home')}}"><i class="ti-home"></i></a>
               <i class="ti-angle-right fs-7 mx-15"></i>
               <a href="{{ route('home')}}" title="Anasayfa">Eğitmenlerimiz</a>
           </div>
       </div>
   </div>
</section>


<section id="team-01" class="py-30 bt-1 b-gray1 b-solid">
    <div class="container">
       <div class="row">
        @foreach ($All as $item)

          <figure class="col-lg-4 col-sm-6 col-12 mt-30">
            <a href="{{ route('dancer', $item->slug)}}">
             <img src="{{ $item->getFirstMediaUrl('page', 'thumb') }}" class="img-fluid" alt="ON DANCE - {{ $item->title.' - '.$item->seo_key}}"/>
             <figcaption class="pt-20">
                <h4 class="fs-18 dark2">{{$item->title}}</h4>
                <p class="gray6 fs-14 mt-5">{{$item->seo_key}}</p>
             </figcaption>
            </a>
          </figure>
       
          @endforeach         
       </div>
    </div>
</section>

@endsection