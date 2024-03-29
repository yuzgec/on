<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/iletisim', [HomeController::class, 'contact'])->name('contactus');
Route::get('/kurumsal', [HomeController::class, 'corporate'])->name('corporate');
Route::get('/sayfa/{url}', [HomeController::class, 'corporatedetail'])->name('corporatedetail');

//Hizmetler Route
Route::get('/egitimlerimiz', [HomeController::class, 'services'])->name('services');
Route::get('/egitim/{url}', [HomeController::class, 'service'])->name('service');
Route::get('/yonetim', [HomeController::class, 'management'])->name('management');

Route::get('/egitmenler', [HomeController::class, 'team'])->name('team');
Route::get('/egitmen/{url}', [HomeController::class, 'dancer'])->name('dancer');


Route::get('/studyolarimiz', [HomeController::class, 'studios'])->name('studios');
Route::get('/studio/{url}', [HomeController::class, 'studio'])->name('studio');

Route::get('/etkinlikler', [HomeController::class, 'events'])->name('events');
Route::get('/etkinlik/{url}', [HomeController::class, 'event'])->name('event');

Route::get('/production/{url}', [HomeController::class, 'production'])->name('production');




//Hizmetler Route

Route::get('/makaleler', [HomeController::class, 'blog'])->name('blog');
Route::get('/makale/{url}', [HomeController::class, 'blogdetail'])->name('blogdetail');

Route::get('/sss', [HomeController::class, 'faq'])->name('faq');
Route::get('/onkayit', [HomeController::class, 'preregistration'])->name('pre-registration');
Route::post('/form', [HomeController::class, 'form'])->name('form');


//Shop

Route::group(["prefix"=>"store"], function(){
    Route::get('/', [ShopController::class, 'store'])->name('store');
    Route::get('/urun/{url}', [ShopController::class, 'product'])->name('product');
    Route::get('/kategori/{url}', [ShopController::class, 'category'])->name('category');
    Route::get('/sepet', [ShopController::class,'cart'])->name('cart');
    Route::get('/odeme', [ShopController::class,'checkout'])->name('checkout');
    Route::post('/odeme', [ShopController::class,'pay'])->name('pay');
    Route::post('/save', [ShopController::class,'save'])->name('save');


    Route::post('/addtocart', [ShopController::class,'addtocart'])->name('addtocart');

});


Route::group(["prefix"=>"go", 'middleware' => ['auth','web', 'admin']],function() {
    Route::get('/', 'DashboardController@index')->name('go');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/formlar', 'DashboardController@formlar')->name('formlar');
    Route::delete('/formDelete/{id}', 'DashboardController@formDelete')->name('formDelete');
    Route::auto('/page', PageController::class);
    Route::auto('/page-categories', PageCategoryController::class);
    Route::auto('/blog', BlogController::class);
    Route::auto('/blog-categories', BlogCategoryController::class);
    Route::auto('/faq', FaqController::class);
    Route::auto('/faq-categories', FaqCategoryController::class);
    Route::auto('/gallery', GalleryController::class);
    Route::auto('/service', ServiceController::class);
    Route::auto('/service-categories', ServiceCategoryController::class);
    Route::auto('/gallery-categories', GalleryCategoryController::class);
    Route::auto('/slider', SliderController::class);
    Route::auto('/video', VideoController::class);
    Route::auto('/video-categories', VideoCategoryController::class);
    Route::auto('/settings', SettingController::class);
    Route::auto('/product', ProductController::class);
    Route::auto('/product-categories', ProductCategoryController::class);
    Route::auto('/contact', ContactController::class);
    Route::auto('/features', FeaturesController::class);
    Route::auto('/reference', ReferenceController::class);
    Route::auto('/price', PriceController::class);
    Route::auto('/attribute', AttributesController::class);
    Route::auto('/attributevalue', AttributeValueController::class);

});

require __DIR__.'/auth.php';
