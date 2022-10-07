<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware('guest:admin', 'history')->group(function(){

        // This Is Page Login Admin 
        Route::view('/login' ,'admin.login')
            ->name('login');

        // This Is Route Check Login In DataBase
        Route::post('/check' ,[AdminController::class , 'adminLoginCheck'])
            ->name('check');
    });


    Route::middleware('auth:admin' , 'history' , 'notification')->group(function(){


        // This IS Pages Dashboard
        Route::get('/dashboard'                      , [DashboardController::class  , 'dashboard'])
            ->name('dashboard');

        Route::get('/chart/order'                    , [DashboardController::class  , 'chartOrder'])
            ->name('chart.order');

        Route::post('/logout'                        , [AdminController::class      , 'logout'])
            ->name('logout');
        
        // This Is Pages All Category
        Route::get('/categories'                     , [CategoriesController::class , 'index'])
            ->name('category.index');

        Route::post('/category/store'                , [CategoriesController::class , 'store'])
            ->name('category.store');

        Route::put('/category/update/{id}'           , [CategoriesController::class , 'update'])
            ->name('category.update');

        Route::delete('/category/delete/{id}'        , [CategoriesController::class , 'destroy'])
            ->name('category.delete');


        // This Is Pages All Tags
        Route::get('tags'                             , [TagController::class         , 'index'])
            ->name('tag.index');

        Route::post('tag/store'                       , [TagController::class         , 'store'])
            ->name('tag.store');

        Route::put('tag/{id}/update'                  , [TagController::class         , 'update'])
            ->name('tag.update');

        Route::delete('tag/{id}/delete'               , [TagController::class         , 'destroy'])
            ->name('tag.delete');


        // This Is Pages All Products 
        Route::get('/products'                        , [ProductController::class   , 'index'])
            ->name('product.index');

        Route::post('product/store'                   , [ProductController::class   , 'store'])
            ->name('product.store');

        Route::put('/product/{product}/update'        , [ProductController::class   , 'update'])
            ->name('product.update');   
            
        Route::get('/product//inactivate'             , [ProductController::class   , 'getAllInactiveProducts'])
            ->name('products.inactivate');   

        Route::put('/product/{product}/activate'      , [ProductController::class   , 'activate'])
            ->name('product.activate');   

        Route::delete('/product/{slug}/delete'        , [ProductController::class   , 'destroy'])
            ->name('product.delete');

        Route::delete('/product/delete/subPhoto/{id}' , [ProductController::class   , 'destroySubPhoto'])
            ->name('product.delete.sub_photo');
        // -----------End-------------- //


        // This Is Pages All suppliers 
        Route::get('/suppliers'                      , [SupplierController::class   , 'index'])
            ->name('supplier.index');

        Route::get('/suppliers/activate'             , [SupplierController::class   , 'isActivate'])
            ->name('supplier.isActivate');

        Route::put('/supplier/activate/{id}'         , [SupplierController::class   , 'activateSupplier'])
            ->name('supplier.activate');

        Route::post('supplier/store'                 , [SupplierController::class   , 'store'])
            ->name('supplier.store');

        Route::put('/supplier/update/{id}'           , [SupplierController::class   , 'update'])
            ->name('supplier.update');

        Route::put('/supplier/change/password/{id}'  , [SupplierController::class   , 'changePasswoed'])
            ->name('supplier.change.password');

        Route::delete('/supplier/delete/{id}'        , [SupplierController::class   , 'destroy'])
            ->name('supplier.delete');
        // -----------End-------------- //

         // This Is Pages All Users 
        Route::get('/users'                          , [UserController::class       , 'index'])
            ->name('users.index');

        Route::post('user/store'                     , [UserController::class       , 'store'])
            ->name('user.store');

        Route::put('/user/update/{id}'               , [UserController::class       , 'update'])
            ->name('user.update');

        Route::put('/user/change/password/{id}'      , [UserController::class       , 'changePassword'])
            ->name('user.change.password');

        Route::delete('/user/delete/{id}'            , [UserController::class       , 'destroy'])
            ->name('user.delete');
        // -----------End-------------- //

        // This Is Pages Comments
        Route::get('/comments'                       , [CommentController::class    , 'index'])
            ->name('comment.index');

        Route::post('/comment'                       , [CommentController::class    , 'store'])
            ->name('comment.store');

        Route::delete('/comment/{id}'                , [CommentController::class    , 'destroy'])
            ->name('comment.delete');
        // -----------End-------------- //

        //This Is Pages Orders
        Route::get('/orders'                         , [OrderProductController::class , 'index'])
            ->name('orders.index');
        // -----------End-------------- //


        //This Is Pages Notifications
        Route::get('/notifications'                  , [AdminController::class      , 'getnotifications'])
            ->name('notifications.all');

        Route::get('/show/notification/{id}'         , [AdminController::class      , 'show'])
            ->name('notification.show');
        // -----------End-------------- //
    });     
});
