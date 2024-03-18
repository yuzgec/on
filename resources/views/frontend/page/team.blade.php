@extends('frontend.app.master')


@section('content')


<section id="home" class="relative white height-40vh mnh-250 align-items-center d-flex" 
data-bg="url(https://goldeyes.net/quadra/images/backgrounds/background_25.jpg)" 
data-was-processed="true" 
style="background-image: url(https://goldeyes.net/quadra/images/backgrounds/background_25.jpg);">
    <div class="container-md">
        <div class="t-center">
            <h5 class="fs-11 ls-4 semibold white uppercase">
               Ondance 
            </h5>
            <h1 class="mt-15 lh-md white">
                Eğitmenlerimiz
            </h1>

            <div
                class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center">
                <a href="{{ route('home')}}">
                    <i class="ti-home"></i>
                </a>
                <i class="ti-angle-right fs-7 mx-15"></i>
                <a href="{{ route('home')}}">Anasayfa</a>
                <i class="ti-angle-right fs-7 mx-15"></i>
                <a href="#" class="stay c-default opacity-7">Kurumsal</a>
                <i class="ti-angle-right fs-7 mx-15"></i>

                <a href="#" class="stay c-default opacity-7">Ekibimiz</a>
            </div>

        </div>
    </div>
</section>


<section id="team-01" class="py-30 bt-1 b-gray1 b-solid">
    <div class="container">
       <div class="row">
        @foreach ($All as $item)
          <figure class="col-lg-3 col-sm-6 col-12 mt-30 c-plus" data-bs-toggle="modal" data-bs-target="#modal-01">
             <div class="fullwidth height-350" data-bg="url({{ $item->getFirstMediaUrl('page', 'thumb') }})" data-was-processed="true" style="background-image: url(&quot;images/clients/avatar_01.jpg&quot;);"></div>
             <figcaption class="pt-20">
                <h4 class="fs-18 dark2">{{$item->title}}</h4>
                <p class="gray6 fs-14 mt-5">Dans Eğitmeni</p>
             </figcaption>
          </figure>
          @endforeach         
       </div>
    </div>
 </section>

@endsection