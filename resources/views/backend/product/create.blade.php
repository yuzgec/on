@extends('backend.layout.app')
@section('title', 'Ürün Ekle')
@section('content')

    <div class="col-12 col-md-9">
        <div class="card">
            {{Form::open(['route' => 'product.store', 'enctype' => 'multipart/form-data'])}}

                <div class="card-header d-flex justify-content-between">
                    <x-add title="Ürün"></x-add>
                    <div>
                        <x-back></x-back>
                        <x-save></x-save>
                    </div>
                </div>
                <div class="card-body">

                <x-form-inputtext label="Ürün Adı" name="title"/>
                <x-form-inputtext label="Ürün Kodu" name="sku"/>

                <div class="form-group mb-3 row">
                    <label class="form-label col-3 col-form-label">Kategori </label>
                    <div class="col">
                        <select class="form-control multi" data-placeholder="Kategori Seçiniz" multiple name="category[]">
                            @php renderCategoriesCreate($Product_Categories) @endphp
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <label class="form-label col-3 col-form-label">Seçenek </label>
                    <div class="col-6 col-md-2">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Secenek1
                            <input class="form-check-input switch" name="option1" type="checkbox" value="0">
                        </label>
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Secenek2
                            <input class="form-check-input switch" name="option2" type="checkbox" value="0">
                        </label>
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Secenek3
                            <input class="form-check-input switch" name="option3" type="checkbox" value="0">
                        </label>
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Stok YOK
                            <input class="form-check-input switch" name="option4" type="checkbox" value="0">
                        </label>
                    </div>
                </div>
            

                @foreach ($Attribute as $item)
                <div class="form-group mb-3 row">
                    <label class="form-label col-3 col-form-label">Ürün Özellikleri ({{ $item->name}}) </label>
                        @foreach (\App\Models\AttributeValue::where('attribute_id', $item->id)->get() as $row)
                            <div class="col-6 col-md-2 form-selectgroup-pills">
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="name" value="{{ $row->value}}" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">{{ $row->value}}</span>
                                </label>
                            </div>
                        @endforeach
                  </div>
                @endforeach


                <div class="form-group mb-3 row">
                    <label class="form-label col-3 col-form-label">Listele </label>
                    <div class="col-3">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Günün Fırsatı
                            <input class="form-check-input switch" name="opportunity" type="checkbox" value="0">
                        </label>
                    </div>
                    <div class="col-3">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Kampanya
                            <input class="form-check-input switch" name="offer" type="checkbox" value="0">
                        </label>
                    </div>
                    <div class="col-3">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Çok Satan
                            <input class="form-check-input switch" name="bestselling" type="checkbox" value="0">
                        </label>
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <label class="form-label col-3 col-form-label"> </label>
                    <div class="col-3">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Ücretsiz Kargo
                            <input class="form-check-input switch" name="freecargo" type="checkbox" value="0">
                        </label>
                    </div>
                    <div class="col-3">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Hızlı Gönderi
                            <input class="form-check-input switch" name="fastkargo" type="checkbox" value="0">
                        </label>
                    </div>
                    <div class="col-3">
                        <label class="form-check form-check-single form-switch mt-2">&nbsp; Büyük Fırsat
                            <input class="form-check-input switch" name="bigopportunity" type="checkbox" value="0">
                        </label>
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <label class="form-label col-3 col-form-label">Fiyat </label>
                    <div class="col-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text">₺</span>
                            <input type="text" class="form-control  @if($errors->has('sku')) is-invalid @endif" name="price" placeholder="Fiyat Giriniz" autocomplete="off" value="{{ old('price') }}">
                            @if($errors->has('price'))
                                <div class="invalid-feedback" style="display: block">{{$errors->first('price')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text">₺</span>
                            <input type="text" class="form-control" name="old_price" placeholder="Eski Fiyat Giriniz" autocomplete="off" value="{{ old('old_price') }}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group mb-2">
                            <span class="input-group-text">%</span>

                            <input type="text" class="form-control  @if($errors->has('tax')) is-invalid @endif" name="tax" placeholder="KDV Giriniz" autocomplete="off" value="{{ old('tax') }}">
                            @if($errors->has('tax'))
                                <div class="invalid-feedback valid">{{$errors->first('tax')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <x-form-textarea label="Kısa Açıklama" name="short" ck="short"/>
                <x-form-textarea label="Açıklama" name="desc" :ck/>
                <div class="card-header mb-2">
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 272 92" width="80" ><path fill="#EA4335" d="M115.75 47.18c0 12.77-9.99 22.18-22.25 22.18s-22.25-9.41-22.25-22.18C71.25 34.32 81.24 25 93.5 25s22.25 9.32 22.25 22.18zm-9.74 0c0-7.98-5.79-13.44-12.51-13.44S80.99 39.2 80.99 47.18c0 7.9 5.79 13.44 12.51 13.44s12.51-5.55 12.51-13.44z"/><path fill="#FBBC05" d="M163.75 47.18c0 12.77-9.99 22.18-22.25 22.18s-22.25-9.41-22.25-22.18c0-12.85 9.99-22.18 22.25-22.18s22.25 9.32 22.25 22.18zm-9.74 0c0-7.98-5.79-13.44-12.51-13.44s-12.51 5.46-12.51 13.44c0 7.9 5.79 13.44 12.51 13.44s12.51-5.55 12.51-13.44z"/><path fill="#4285F4" d="M209.75 26.34v39.82c0 16.38-9.66 23.07-21.08 23.07-10.75 0-17.22-7.19-19.66-13.07l8.48-3.53c1.51 3.61 5.21 7.87 11.17 7.87 7.31 0 11.84-4.51 11.84-13v-3.19h-.34c-2.18 2.69-6.38 5.04-11.68 5.04-11.09 0-21.25-9.66-21.25-22.09 0-12.52 10.16-22.26 21.25-22.26 5.29 0 9.49 2.35 11.68 4.96h.34v-3.61h9.25zm-8.56 20.92c0-7.81-5.21-13.52-11.84-13.52-6.72 0-12.35 5.71-12.35 13.52 0 7.73 5.63 13.36 12.35 13.36 6.63 0 11.84-5.63 11.84-13.36z"/><path fill="#34A853" d="M225 3v65h-9.5V3h9.5z"/><path fill="#EA4335" d="M262.02 54.48l7.56 5.04c-2.44 3.61-8.32 9.83-18.48 9.83-12.6 0-22.01-9.74-22.01-22.18 0-13.19 9.49-22.18 20.92-22.18 11.51 0 17.14 9.16 18.98 14.11l1.01 2.52-29.65 12.28c2.27 4.45 5.8 6.72 10.75 6.72 4.96 0 8.4-2.44 10.92-6.14zm-23.27-7.98l19.82-8.23c-1.09-2.77-4.37-4.7-8.23-4.7-4.95 0-11.84 4.37-11.59 12.93z"/><path fill="#4285F4" d="M35.29 41.41V32H67c.31 1.64.47 3.58.47 5.68 0 7.06-1.93 15.79-8.15 22.01-6.05 6.3-13.78 9.66-24.02 9.66C16.32 69.35.36 53.89.36 34.91.36 15.93 16.32.47 35.3.47c10.5 0 17.98 4.12 23.6 9.49l-6.64 6.64c-4.03-3.78-9.49-6.72-16.97-6.72-13.86 0-24.7 11.17-24.7 25.03 0 13.86 10.84 25.03 24.7 25.03 8.99 0 14.11-3.61 17.39-6.89 2.66-2.66 4.41-6.46 5.1-11.65l-22.49.01z"/></svg>
                        Seo Bilgileri
                    </h4>
                </div>
                <x-form-inputtext label="Seo Başlık" name="seo_title"/>
                <x-form-inputtext label="Seo Açıklama" name="seo_desc"/>
                <x-form-inputtext label="Seo Anahtar Kelime " name="seo_key"/>
            </div>

        </div>
    </div>

    <div class="col-12 col-md-3">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="15" y1="8" x2="15.01" y2="8" /><rect x="4" y="4" width="16" height="16" rx="3" /><path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" /><path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" /></svg>
                    Ürün Kapak Resim
                </h4>
            </div>

            <div class="p-2">
                <input type="file" name="image" multiple class="form-control">
            </div>
        </div>

        <div class="card mt-2" >
            <div class="card-header">
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" /><line x1="9" y1="13" x2="15" y2="13" /></svg>
                    Ürün Galeri
                </h4>
            </div>
            <div class="p-2">
                <input type="file" name="gallery[]" multiple class="form-control">
                @if($errors->has('gallery'))
                    <div class="invalid-feedback" style="display: block">{{$errors->first('gallery')}}</div>
                @endif
            </div>
        </div>
    </div>
    {{Form::close()}}
@endsection
@section('customCSS')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/backend/css/select2theme.css" rel="stylesheet" />
@endsection
@section('customJS')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('.single').select2({
                theme: 'bootstrap-5',
            });

            $('.multi').select2({
                theme: 'bootstrap-5',
                closeOnSelect: true
            });
        });

        $('input[type="checkbox"]').on('change', function(){
            this.value ^= 1;
        });
        CKEDITOR.replace('short', {
            height : 100,
            toolbar: [
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold']},
                { name: 'paragraph',items: [ 'BulletedList']},
                { name: 'colors', items: [ 'TextColor' ]},
                { name: 'styles', items: [ 'Format', 'FontSize']},

            ],
        });
        CKEDITOR.replace( 'aciklama', {
            filebrowserUploadUrl: "{{ route('product.postUpload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            height : 300,
            toolbar: [
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold']},
                { name: 'paragraph',items: [ 'BulletedList']},
                { name: 'colors', items: [ 'TextColor' ]},
                { name: 'styles', items: [ 'Format', 'FontSize']},
                { name: 'links', items : [ 'Link', 'Unlink'] },
                { name: 'insert', items : [ 'Image', 'Table']},
                { name: 'document', items : [ 'Source','Maximize' ]},
                { name: 'clipboard', items : [ 'PasteText', 'PasteFromWord' ]},
            ],
        });
    </script>
@endsection
