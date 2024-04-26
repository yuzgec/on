@extends('backend.layout.app')
@section('content')

<div class="col-12 col-md-12 mb-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    Sipariş Listesi
                </h4>
            </div>
            <div class="d-flex">
                <a class="btn btn-primary btn-sm rounded m-1" href="{{  url()->previous() }}" title="Geri">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" /></svg>
                    Fatura İptal
                </a> 

                <a class="btn btn-primary btn-sm rounded m-1" href="{{  url()->previous() }}" title="Geri">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" /></svg>
                    Fatura İmzala
                </a> 
              
                <a class="btn btn-primary btn-sm rounded m-1" href="{{  url()->previous() }}" title="Geri">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" /></svg>
                    HTML Fatura
                </a> 
            </div>
        </div>

    </div>
</div>


<div class="col-md-6 col-lg-6">
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
            <td>Ödeme Durumu</td>
            <td><span class="badge bg-{{shopPayBadge($Detail->basket_status)}} me-1"></span> {{$Detail->basket_status}}</td>
          </tr>
          @if ($Detail->error_message )
          <tr>
            <td>Hata Mesajı</td>
            <td>{{ $Detail->error_message }}</td>
          </tr>
          @endif
       
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
        <h3 class="card-title">Sipariş Bilgileri ({{ $Detail->get_order_count}}) - <span class="badge bg-green"> {{ $Detail->basket_total}}₺ </span></h3>
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
            @if ($item->size)
        
            <tr>
                <td colspan="4">
                <b> Beden = {{ $item->size}}</b>
                </td>
            </tr>
            @endif   
            @if ($item->color)
        
            <tr>
                <td colspan="4">
                <b> Renk = {{ $item->color}}</b>
                </td>
            </tr>
            @endif   
            @if ($item->ticket_name)
        
            <tr>
                <td colspan="4">
                <b> Katılımcı = {{ $item->ticket_name}}</b>
                </td>
            </tr>
            @endif   
            </tbody>
        </table>
      </div>
      @endforeach

    </div>

    <div class="card mt-3">

        <div class="card-header">
          <h3 class="card-title">Ödeme Bilgileri</h3>
        </div>
  
      
        <table class="table card-table table-vcenter table-hover table-striped">
        
          <tbody>
            <tr>
              <td>ARA TOPLAM</td>
              <td>{{ money(round($Detail->basket_total / 1.20))}} </td>
            </tr>
            <tr>
              <td>KDV</td>
              <td>{{ money(floatval($Detail->basket_total) - floatval(round($Detail->basket_total / 1.20)))}} </td>
            </tr>
            <tr>
            <td>TOPLAM</td>
                <td>{{ $Detail->basket_total}}₺ </td>
            </tr>   
          </tbody>
        </table>
      </div>
  </div>

  
@endsection