<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



            Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'admin'], function(){


                Route::get('dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
                Route::post('add/product', [\App\Http\Controllers\Product\ProductContorlelr::class, 'addProduct'])->name('add.product');
                Route::get('show/product', [\App\Http\Controllers\Product\ProductContorlelr::class, 'index'])->name('show.product');
                Route::get('/product-edit/{product_id}',[\App\Http\Controllers\Product\ProductContorlelr::class,'edit']);
                Route::post('product/data-update',[\App\Http\Controllers\Product\ProductContorlelr::class,'update'])->name('update-product-data');
                Route::get('/product-delete/{product_id}',[\App\Http\Controllers\Product\ProductContorlelr::class,'delete']);
                Route::get('product-inactive/{id}',[\App\Http\Controllers\Product\ProductContorlelr::class,'inactive']);
                Route::get('product-active/{id}',[\App\Http\Controllers\Product\ProductContorlelr::class,'active']);




            });



            Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'user'], function(){


                Route::get('dashboard', [\App\Http\Controllers\Customer\CustomerController::class, 'index'])->name('customer.dashboard');

            });


            Route::group(['prefix'=>'manager','middleware' =>['manager','auth'],'namespace'=>'manager'], function(){
                Route::get('dashboard', [\App\Http\Controllers\Manager\ManagerController::class, 'index'])->name('manager.dashboard');
            });


