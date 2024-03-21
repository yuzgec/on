<?php

use App\Http\Controllers\HomeController;
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

Route::get('/kampanyalarimiz', [HomeController::class, 'campaigns'])->name('campaigns');
Route::get('/kampanya/{url}', [HomeController::class, 'campaign'])->name('campaign');

//Hizmetler Route

Route::get('/projelerimiz', [HomeController::class, 'project'])->name('project');
Route::get('/proje/{url}', [HomeController::class, 'projectdetail'])->name('projectdetail');
Route::get('/makaleler', [HomeController::class, 'blog'])->name('blog');
Route::get('/makale/{url}', [HomeController::class, 'blogdetail'])->name('blogdetail');
Route::get('/sss', [HomeController::class, 'sss'])->name('sss');
Route::get('/video-galeri', [HomeController::class, 'video'])->name('video');
Route::get('/referanslarimiz', [HomeController::class, 'reference'])->name('reference');
Route::get('/sss', [HomeController::class, 'faq'])->name('faq');
Route::get('/ik', [HomeController::class, 'hr'])->name('hr');
Route::get('/ders-programi', [HomeController::class, 'syllabus'])->name('syllabus');
Route::get('/onkayit', [HomeController::class, 'preregistration'])->name('pre-registration');




Route::post('/form', [HomeController::class, 'form'])->name('form');

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
    Route::auto('/contact', ContactController::class);
    Route::auto('/features', FeaturesController::class);
    Route::auto('/reference', ReferenceController::class);
    Route::auto('/price', PriceController::class);

});

require __DIR__.'/auth.php';
