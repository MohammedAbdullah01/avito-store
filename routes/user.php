<?php
// use App\Http\Controllers\Front\Product\ProductController;
// use App\Http\Controllers\Front\Supplier\SupplierController;

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\front\Comment\CommentController;
use App\Http\Controllers\Front\Payments\PaypalController;
use App\Http\Controllers\Front\Product\FavouritesController;
use App\Http\Controllers\Front\Product\RatingController;
use App\Http\Controllers\Front\Supplier\SupplierController;
use App\Http\Controllers\Front\User\ProfileController;
use App\Http\Controllers\Front\User\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function()
//     {

    Route::prefix('user')->name('user.')->group(function(){

        Route::middleware('guest:web,supplier'  , 'history' , 'notification')->group(function(){

            Route::view('/register'                 , 'front.pages.users.auth.register')
            ->name('register');

            Route::post('/register/store'           , [UserController::class , 'store'])
            ->name('register.store');

            Route::view('/login'                    , 'front.pages.users.auth.login')
            ->name('login');

            Route::post('/login/check'              , [UserController::class , 'check'])
            ->name('login.check');

            Route::view('password/forget'           , 'front.pages.users.auth.forgotPassword')
                ->name('forgot.password');

            Route::post('password/forgot'           , [UserController::class, 'sendResetLink'])
                ->name('forgot.password.link');

            Route::get('password/reset/{token}'     , [UserController::class, 'showPasswordResetForm'])
                ->name('password.reset');

            Route::PUT('confirm/password'           , [UserController::class, 'confirmPasswordUpdate'])
                ->name('confirm.password.update');

            Route::get('password/reset/{token}'     , [UserController::class, 'showPasswordResetForm'])
                ->name('password.reset');


            Route::get('verify'                     , [UserController::class, 'verify'])
                ->name('verify');
        });


        Route::middleware('auth:web,admin' , 'is_user_verify_email' , 'history')->group(function(){
            Route::get('/profile/{name}'                  , [ProfileController::class  , 'profile'])
            ->name('profile');

            Route::put('/profile/update/'                 , [ProfileController::class  , 'update'])
            ->name('update');

            Route::put('update/password/{id}'             , [ProfileController::class  , 'changePassword'])
            ->name('change.password');

            Route::post('/logout'                         , [UserController::class , 'logout'])
            ->name('logout');

            Route::post('/favorite/products'              , [FavouritesController::class , 'productsFavouritesStore'])
            ->name('favorite.products');

            Route::get('/cart'                            ,  [CartController::class   , 'index' ])
                ->name('cart.index');

            Route::post('/cart/store'                     ,  [CartController::class   , 'store' ])
                ->name('cart.store');

            Route::delete('/cart/delete'                  ,  [CartController::class   , 'destroy' ])
                ->name('cart.destroy');

            Route::delete('/product/cart/delete/{id}'     ,  [CartController::class   , 'productcartDestory' ])
                ->name('product.cart.destroy');

            Route::get('/cart/checkout'                   ,  [CartController::class   , 'createCheckout' ])
                ->name('checkout.create');

            Route::post('/cart/checkout/store'            ,  [CartController::class   , 'storeCheckout' ])
                ->name('checkout.store');

            Route::get('/payment/paypal/{order}'          ,  [PaypalController::class , 'create' ])
                ->name('payment.create');

            Route::get('/payment/paypal/{order}/callcack' ,  [PaypalController::class , 'callcack' ])
                ->name('payment.callcack');

            Route::get('/payment/paypal/{order}/cancel'   ,  [PaypalController::class , 'cancel' ])
                ->name('payment.cancel');

            Route::post('/rating/store'                   ,  [RatingController::class , 'store' ])
                ->name('rating.store');

            Route::post('/comment/store'                  ,  [CommentController::class , 'store' ])
                ->name('comment.store');




            // Route::post('/profile/product/store'      ,[ProductController::class   , 'store'])->name('product.store');
            // Route::put('/profile/product/update/{id}'    ,[ProductController::class   , 'update'])->name('product.update');
            // Route::delete('/profile/product/delete/{id}' ,[ProductController::class , 'destory'])->name('delete');
        });

    });
// });
