<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevController;

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
    return view('scanner');
});

Route::group(['middleware' => ['auth','role:Admin'], 'prefix' => 'admin'], function () {
    Route::group(['prefix' => 'produk'], function () {
        Route::post('/store','ProductController@store');
        Route::post('/update/{id}','ProductController@update');
        Route::post('/trash-restore/{id}','ProductController@trashOrRestore');
        Route::post('/restore-all','ProductController@restoreAll');
        Route::post('/delete/{id}','ProductController@delete');
    });

    

    Route::get('/yo', function () {
        return 'hai';
    });
});

Route::group(['prefix' => 'dev'], function () {
    Route::get('/pusher', function () {
        return view('pusher');
    });

    Route::get('/layout', 'DevController@layout');
    Route::get('/qrcode', 'DevController@generateQRcode');
    Route::get('/testRelasi', 'DevController@testRelasi');
    // TRANSACTION
    Route::get('/transaksi', 'TransactionController@storeTransaction');

    // PRODUK
    Route::get('/product/store','ProductController@store'); //Store Product
    // Route::get('/product/update/{id}','ProductController@update'); //update Product
    // Route::get('/product/trash/{id}','ProductController@trashOrRestore'); //trash Product
    // Route::get('/product/delete/{id}','ProductController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
