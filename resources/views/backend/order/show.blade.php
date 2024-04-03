@extends('backend.layout.app')
@section('content')

<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title">Sipariş Yönetimi</h3>
                </div>
                <div>
                    <a href="" class="btn btn-sm btn-primary">asdas</a>
                </div>
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
            <td>{{ $Detail->firstname.' '.$Detail->surname}}</td>
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
            <td>Sipariş Notu</td>
            <td><span class="badge bg-{{shopPayBadge($Detail->basket_status)}} me-1"></span> {{$Detail->basket_status}}</td>
          </tr>
          <tr>
            <td>Sipariş Notu</td>
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
            <tr>
                <td colspan="4">
                <b> Katılımcı = Olcay Yüzgeç</b>
                </td>
            </tr>
                    
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
              <td>{{ $Detail->basket_total}}₺ </td>
            </tr>
            <tr>
              <td>KDV</td>
              <td>{{ $Detail->basket_total}}₺ </td>
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