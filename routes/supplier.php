<?php

use App\Http\Controllers\front\NotificationsController;
use App\Http\Controllers\Front\Product\ProductController;
use App\Http\Controllers\Front\Supplier\ProfileController;
use App\Http\Controllers\Front\Supplier\SupplierController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function()
//     {

Route::prefix('supplier')->name('supplier.')->group(function(){

    Route::get('v/profile/{name}'                   , [ProfileController::class  , 'profile'])
        ->name('profile.view');

    Route::middleware('guest:supplier,web,admin'  ,  'history')->group(function(){

        Route::view('/register'                     ,'front.pages.suppliers.auth.register')
            ->name('register');

        Route::post('/register/store'               , [SupplierController::class , 'store'])
            ->name('register.store');

        Route::view('/login'                        ,'front.pages.suppliers.auth.login')
            ->name('login');

        Route::post('/login/check'                  , [SupplierController::class , 'check'])
            ->name('login.check');

        Route::view('password/forget'               , 'front.pages.suppliers.auth.forgotPassword')
            ->name('forgot.password');

        Route::post('password/forgot'               , [SupplierController::class , 'sendResetLink'])
            ->name('forgot.password.link');

        Route::get('password/reset/{token}'         , [SupplierController::class , 'showPasswordResetForm'])
            ->name('password.reset');

        Route::PUT('confirm/password'               , [SupplierController::class , 'confirmPasswordUpdate'])
            ->name('confirm.password.update');

        Route::get('password/reset/{token}'         , [SupplierController::class , 'showPasswordResetForm'])
            ->name('password.reset');

        Route::get('verify'                         , [SupplierController::class , 'verify'])
            ->name('verify');
    });

    Route::middleware(['auth:supplier,admin' , 'is_user_verify_email' ,  'history' ])->group(function(){

        Route::get('profile/{name}'                , [ProfileController::class  , 'profile'])
            ->name('profile');

        Route::get('/profile/{name}/edit'          , [ProfileController::class  , 'edit'])
            ->name('edit');

        Route::put('/profile/update'               , [ProfileController::class  , 'update'])
            ->name('update');

        Route::put('/update/password/{id}'         , [ProfileController::class  , 'changePassword'])
            ->name('change.password');

        Route::post('/profile/product/store'       , [ProductController::class   , 'store'])
            ->name('product.store');

        Route::put('/product/update/{product}'     , [ProductController::class   , 'update'])
            ->name('product.update');

        Route::delete('/product/delete/{product}'  , [ProductController::class   , 'destroy'])
            ->name('delete');

        Route::post('/logout/supplier'             , [SupplierController::class  , 'logout'])
            ->name('logout');

        Route::get('notifications'                 , [NotificationsController::class  , 'notifications'])
            ->name('notifications.all');

        Route::get('/show/notification/{id}'       , [NotificationsController::class  , 'show'])
            ->name('notification.show');

        Route::delete('/delete/notification/{id}'  , [NotificationsController::class  , 'destory'])
            ->name('notification.delete');

    });

});
// });
