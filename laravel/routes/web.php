<?php

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


Route::get('chat/', 'Chat\ChatController@index');
Route::get('coupons/', 'CouponPoolController@index')->name('coupons.index');
Route::put('coupons/obtain', 'CouponPoolController@obtainCoupon')
        ->name('coupons.obtain')
        ->middleware('check.obtain.allow');
Route::put('coupons/release', 'CouponPoolController@releaseCoupons')->name('coupons.release');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
