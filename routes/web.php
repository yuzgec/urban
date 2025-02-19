<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::get('/', [HomeController::class, 'index'])->name('home');

    //dd(__('menu.iletisim'));

    Route::get(__('menu.iletisim'), [HomeController::class, 'contactus'])->name('contactus');
    Route::get(__('menu.referanslar'), [HomeController::class, 'reference'])->name('reference');
    Route::get(__('menu.galeri'), [HomeController::class, 'gallery'])->name('gallery');
    Route::get(__('menu.blog'), [HomeController::class, 'blog'])->name('blog');

    Route::get(__('menu.kurumsal').'/{url}', [HomeController::class, 'corporatedetail'])->name('corporatedetail');
    Route::get(__('menu.hizmetlerimiz'), [HomeController::class, 'service'])->name('service');
    Route::get(__('menu.hizmet').'/{url}', [HomeController::class, 'servicedetail'])->name('servicedetail');

    Route::get(__('menu.proje').'/{url}', [HomeController::class, 'projectdetail'])->name('projectdetail');
    Route::get(__('menu.projeler'), [HomeController::class, 'project'])->name('project');
    Route::get(__('menu.blog').'/{url}', [HomeController::class, 'blogdetail'])->name('blogdetail');

    Route::get('video', [HomeController::class, 'video'])->name('video');
    Route::get('foto', [HomeController::class, 'foto'])->name('foto');

});

Route::group(["prefix"=>"go", 'middleware' => ['auth','web', 'admin']],function() {
    Route::get('/', 'DashboardController@index')->name('go');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::auto('/page', PageController::class);
    Route::auto('/pagecategory', PageCategoryController::class);
    Route::auto('/product', ProductController::class);
    Route::auto('/productcategory', ProductCategoryController::class);
    Route::auto('/blog', BlogController::class);
    Route::auto('/blogcategory', BlogCategoryController::class);
    Route::auto('/service', ServiceController::class);
    Route::auto('/servicecategory', ServiceCategoryController::class);
    Route::auto('/slider', SliderController::class);
    Route::auto('/settings', SettingController::class);
    Route::auto('/reference', ReferenceController::class);
    Route::resource('language-lines', LanguageLineController::class);
});

Route::get('/get-service-gallery/{slug?}', [HomeController::class, 'getServiceGallery'])->name('get.service.gallery');

require __DIR__.'/auth.php';
