@extends('backend.layout.app')
@section('content')
<div class="col-12 col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    Sipariş Listesi [{{ $All->count() }}]
                </h4>
            </div>
            <div class="d-flex">
                <a class="btn btn-primary btn-sm rounded" href="{{  url()->previous() }}" title="Geri">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" /></svg>
                    Geri
                </a> 

                <div class="input-icon mb-2">
                    <input class="form-control " placeholder="Select a date" id="datepicker-icon" value="{{ Carbon\Carbon::yesterday()->toDateString()}}">
                    <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                    </span>
                  </div>


                  <div class="input-icon mb-2">
                    <input class="form-control " placeholder="Select a date" id="datepicker-icon" value="{{ Carbon\Carbon::now()->toDateString() }}">
                    <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                    </span>
                  </div>

                <input type="date" class="form-control m-1" name="date" value="{{ Carbon\Carbon::yesterday()->toDateString()}}">
                <input type="date" class="form-control m-1" name="date" value="{{ Carbon\Carbon::now()->toDateString() }}">

                <select name="orderby" class="form-control form-select m-1" >
                    <option value="odendi">Ödendi</option>
                    <option value="odenmedi">Ödenmedi</option>
                </select>
            </div>
        </div>

        <div class="table-responsive p-2">
            <table class="table table-hover table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Sipariş No.</th>
                        <th>Ad Soyad</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Başlık</th>
                        <th>Durum</th>
                        <th class="d-none d-lg-table-cell">Tarihi</th>
                    </tr>
                </thead>
                <tbody >
                @foreach($All as $item)
                <tr>
                    <td width="10%">
                        <a href="{{ route('order.show', $item->cart_id )}}" class="btn">{{$item->cart_id}} 
                            <span class="badge bg-green text-green-fg ms-2"> ({{ $item->get_order_count}})</span></a>
                        </a>
                    </td>
                    <td>{{$item->name.' '.$item->surname}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{money($item->basket_total)}}</td>
            
                    <td><span class="badge bg-{{shopPayBadge($item->basket_status)}} me-1"></span> {{$item->basket_status}}</td>
                    <td class="d-none d-lg-table-cell">
                        {{ $item->created_at->diffForHumans() }}
                    </td>
                    
                </tr>
                <div class="modal modal-blur fade" id="silmeonayi{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Silme Onayı</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Silmek üzeresiniz. Bu işlem geri alınmamaktadır.
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
                                    İptal Et
                                </a>
                                <form action="{{ route('page.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                        Silmek İstiyorum
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

