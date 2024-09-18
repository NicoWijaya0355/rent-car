<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MantapController;
use App\Models\Mobil;
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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * Verification Routes
         */
        Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
    });

    Route::group(['middleware' => ['auth','ceklevel:Manager,Admin,Customer Service,Customer,Driver']], function() {
        /**
         * Dashboard Routes
         */
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
       
      
        Route::resource('customers',CustomerController::class);
        Route::resource('mobils',MobilController::class);
        Route::resource('transaksis',TransaksiController::class);
        Route::resource('pegawais',PegawaiController::class);
        Route::resource('jadwals',JadwalController::class);
        Route::resource('drivers',DriverController::class);
        Route::resource('promos',PromoController::class);
        Route::resource('ratings',RatingController::class);
        Route::resource('pemiliks',PemilikController::class);

        Route::get('rating/{id}','RatingController@rata')->name('ratings.rata');
        Route::get('bayar/{id}','TransaksiController@bayar')->name('transaksi.bayar');
        Route::put('bayarUpdate/{id}','TransaksiController@bayarUpdate')->name('transaksi.bayarUpdate');
        Route::get('transaksi/{id}','TransaksiController@cek1')->name('transaksi.cek1');
        Route::put('cek/{id}','TransaksiController@cek')->name('transaksi.cek');
        Route::put('transaksi/{id}','TransaksiController@denda')->name('transaksi.denda');
        Route::get('get/details/{id}', 'TransaksiController@getDetails')->name('getDetails');

        Route::get('/verifikasi/{id}','TransaksiController@verifikasi')->name('transaksi.verifikasi');
        Route::get('customer/verifikasi/{id}','CustomerController@verifikasi')->name('customer.verifikasi');
       
        Route::get('/findDriverTelp','TransaksiController@findDriverTelp');
        Route::get('/findDriverTarif','TransaksiController@findDriverTarif');

        Route::get('/findMobilPlat','TransaksiController@findMobilPlat');
        Route::get('/findMobilHarga','TransaksiController@findMobilHarga');

        Route::get('kontrak/{id}','MobilController@kontrak')->name('mobil.kontrak');
        Route::get('perbaharui/{id}','MobilController@kontrakAwal')->name('mobil.kontrakAwal');
        Route::put('kontrak/{id}','MobilController@kontrakUpdate')->name('mobil.kontrakUpdate');
        Route::get('riwayat/{id}','CustomerController@riwayat')->name('customer.riwayat');
      
        Route::get('exportpdf/{id}','CustomerController@export')->name('customer.export');

        Route::get('show', 'MantapController@index')->name('show.index');
        Route::get('profile', 'ProfileController@index')->name('profile.index');
        Route::put('profile', 'ProfileController@update')->name('profile.update');
        Route::get('riwayatDriver/{id}','DriverController@riwayat')->name('driver.riwayat');
        // Route::resource('profiles',ProfileController::class);
    });
});
