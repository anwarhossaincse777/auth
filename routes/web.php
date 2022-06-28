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
            });



            Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'user'], function(){


                Route::get('dashboard', [\App\Http\Controllers\Customer\CustomerController::class, 'index'])->name('customer.dashboard');

            });


            Route::group(['prefix'=>'manager','middleware' =>['manager','auth'],'namespace'=>'manager'], function(){
                Route::get('dashboard', [\App\Http\Controllers\Manager\ManagerController::class, 'index'])->name('manager.dashboard');
            });


