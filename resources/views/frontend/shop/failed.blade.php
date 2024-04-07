@extends('frontend.app.master')
@section('customCSS')
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ config('settings.facebookPixel') }}');
        fbq('track', 'PageView');
    </script>

    <style>

.successtick {
  height: 275px;
  display: flex;
  justify-content: center;
}

.tick {
  transform-origin: center;
  animation: grow 0.8s ease-in-out forwards;
}

@keyframes grow {
  0% {
    transform: scale(0);
    opacity: 0;
  }
  60% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

.circle {
  transform-origin: center;
  stroke-dasharray: 1000;
  stroke-dashoffset: 0;
  animation: dash 1s linear;
}

@keyframes dash {
  from {
    stroke-dashoffset: 1000;
    opacity: 0;
  }
  to {
    stroke-dashoffset: 0;
  }
}

</style>
  
    @endsection
@section('content')
<noscript><img height="1" width="1" style="display:none"  src="https://www.facebook.com/tr?id={{ config('settings.facebookPixel') }}&ev=PageView&noscript=1"/></noscript>

<script>fbq('track', 'Purchase', {value: 1, currency: 'TRY'});</script>
<section id="home" class="relative bg-danger height-25vh mnh-250 align-items-center d-flex">
    <div class="container-md">
        <div class="t-center">
        
            <div class="container-md mt-30">
                <div class="t-center">
                    <h5 class="fs-11 ls-4 semibold white uppercase">
                        ON DANCE STORE
                    </h5>
                    <h1 class="mt-15 lh-md white">
                       ÖDEME YAPILDI
                    </h1>
        
                    <div
                        class="mt-30 uppercase fs-12 bold bg-soft-dark3 radius-lg py-10 px-40 d-inline-flex width-auto lh-normal align-items-center text-white">
                        <a href="{{ route('home')}}"><i class="ti-home"></i></a>
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
<div class="container mt-20 mb-20">
    <div class="row">
        <div class="col-12">

            <div class="successtick">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                    <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
                    <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
                  </svg>
            </div>
            <div class="t-center mb-30 mt-10">
                <h3>Hata Mesajı = {{ $Detail->error_msg}}</h3>
            </div>
               
        </div>
        <div class="col-md-6 col-12 ">
            <div class="card">
        
              <div class="card-header">
                <h3 class="card-title">Kullanıcı Bilgileri </h3>
              </div>
        
              <table class="table card-table table-vcenter table-hover table-striped">      
                <tbody>
                  <tr>
                    <td>Adı Soyadı</td>
                    <td>{{ $Detail->name.' '.$Detail->surname}}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $Detail->email }}</td>
                  </tr>
                  <tr>
                    <td>Telefon</td>
                    <td>{{ $Detail->phone }}</td>
                  </tr>
                  <tr>
                    <td>Adres</td>
                    <td>{{ $Detail->address }}</td>
                  </tr>
                 
                  <tr>
                    <td>İlçe</td>
                    <td>{{ $Detail->city }}</td>
                  </tr>
                 
                  <tr>
                    <td>İl</td>
                    <td>{{ $Detail->province }}</td>
                  </tr>
                  <tr>
                    <td>Sipariş Notu</td>
                    <td>{{ $Detail->note }}</td>
                  </tr>
    
                  <tr>
                    <td>Sipariş Tarihi</td>
                    <td>{{ $Detail->created_at }}</td>
                  </tr>
                 
                 
                </tbody>
              </table>
            </div>
          </div>
        
        
          <div class="col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sipariş Bilgileri <span class="badge bg-green"> {{ $Detail->basket_total}}₺ </span></h3>
              </div>
              @foreach ($Detail->getOrder as $item)
              <div class="mt-2">
                <table class="table card-table table-vcenter table-hover table-striped">
                    <tbody>
                    <tr>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->price}}</td>
                        <td>X</td>
                        <td>{{ $item->qty}}</td>
                    </tr>
                    @if ($item->ticket_name)
                    <tr>
                        <td colspan="4"><b> Katılımcı = {{$item->ticket_name}}</b></td>
                    </tr>
                    @endif
                    
                            
                    </tbody>
                </table>
              </div>
              @endforeach
        
            </div>
        
            
          </div>
        
    </div>
</div>

@endsection