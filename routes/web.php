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
Route::get('auctioneers/{slug}', 'AuctioneerController@show')->name('auctioneers.show');
Route::get('auction-galleries', 'AuctionGalleryController@index')->name('auction_galleries.index');
Route::get('auction-galleries/{slug}', 'AuctionGalleryController@show')->name('auction_galleries.show');
Route::get('contacts', 'ContactController@index')->name('contacts');
Route::get('privacy-policy', 'HomeController@privacyPolicy')->name('privacy_policy');
Route::post('feedback', 'ContactController@storeFeedback')->name('feedback.store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
