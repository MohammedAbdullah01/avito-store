<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\Product\ProductController;
use App\Http\Controllers\front\TagController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::prefix('{lang}')->group(function () {

    // Route::group(
    //     [
    //         'prefix' => LaravelLocalization::setLocale(),
    //         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    //     ], function()
    //     {

    Route::get('/'                  ,  [HomeController::class, 'index'])
        ->name('home');

    Route::get('products/in/{slug}' ,  [HomeController::class, 'showProductsInCategory'])
        ->name('show.products.in.category');

    Route::get('products'           ,  [ProductController::class, 'index'])
        ->name('products.all');

    Route::get('product/{slug}'     ,  [HomeController::class, 'showProduct'])
        ->name('show.product');

    Route::get('suppliers'          ,  [HomeController::class, 'getSuppliers'])
        ->name('suppliers.all');

    Route::get('about', function () {

        return view('front.pages.about');
    })->name('about');

    Route::get('contact', function () {

        return view('front.pages.contact');
    })->name('contact');

// });
