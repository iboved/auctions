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

Route::get('/', 'HomeController@index')->name('home');
Route::get('auctioneers', 'AuctioneerController@index')->name('auctioneers.index');
Route::get('auctioneers/{auctioneer}', 'AuctioneerController@show')->name('auctioneers.show');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
