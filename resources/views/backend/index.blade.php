@extends('backend.layout.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-3">Kullanılan Alan <strong>276MB </strong>of 8 GB</p>
                <div class="progress progress-separated mb-3">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 44%"></div>
                    <div class="progress-bar bg-info" role="progressbar" style="width: 19%"></div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: 9%"></div>
                </div>
                <div class="row">
                    <div class="col-auto d-flex align-items-center pe-2">
                        <span class="legend me-2 bg-primary"></span>
                        <span>Regular</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">915MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center px-2">
                        <span class="legend me-2 bg-info"></span>
                        <span>System</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">415MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center px-2">
                        <span class="legend me-2 bg-success"></span>
                        <span>Shared</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">201MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center ps-2">
                        <span class="legend me-2"></span>
                        <span>Free</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">612MB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-6 col-xl-3 mt-2">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  132 Sales
                </div>
                <div class="text-secondary">
                  12 waiting payments
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3 mt-2">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  132 Sales
                </div>
                <div class="text-secondary">
                  12 waiting payments
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3 mt-2">
        <div class="card card-sm">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-auto">
                <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path><path d="M12 3v3m0 12v3"></path></svg>
                </span>
              </div>
              <div class="col">
                <div class="font-weight-medium">
                  132 Sales
                </div>
                <div class="text-secondary">
                  12 waiting payments
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <livewire:sms-counter /> 
      
    <div class="{{ $Chart->options['column_class'] }} mt-2 nb-2">
        <div class="card">
            <div class="card-body">
                {!! $Chart->renderHtml() !!}
            </div>
        </div>
    </div>


    <div class="col-12 col-md-4 mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">En Çok Bakılan Sayfalar</h3>
                <div class="ms-auto lh-1">
                    <div class="dropdown">
                      <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown" 
                      aria-haspopup="true" aria-expanded="false">Son 7 Gün</a>
                      <div class="dropdown-menu dropdown-menu-end" style="">
                        <a class="dropdown-item active" href="#">Son 7 Gün</a>
                        <a class="dropdown-item" href="#">Son 30 Gün</a>
                        <a class="dropdown-item" href="#">Hepsi</a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                <div class="divide-y">
                    <table class="table card-table table-vcenter">
                        <thead>
                        <tr>
                            <th>Sayfa Adı</th>
                            <th colspan="2">Ziyaret Sayısı</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($PopularPages as $item)
                            <tr>
                                <td>{{ $item->title}}</td>
                                <td>{{ $item->views_count}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Aranan Kelimeler</h3>
            </div>
            <table class="table card-table table-vcenter">
                <thead>
                <tr>
                    <th>Aranan Kelime</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Search as $item)
                <tr>
                    <td>{{ $item->key }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('customJS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
{!! $Chart->renderJs() !!}
@endsection

