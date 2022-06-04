<?php

use App\Models\DroneShop;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistController;

Route::get('/', function () {
    return view('header');
})->name('home');

Route::get('/registration', function () {
    return view('regist');
});
Route::get('/autorization', function () {
    return view('auth');
})->name('auth');

//Route::get('/office', function () {
//    return view('office');
//})->name('office');


Route::get('/verify', function () {
    return view('verify');
})->name('verify');

Route::post('/registration/submit', 'App\Http\Controllers\RegistController@submit');
Route::post('/autorization/submit', 'App\Http\Controllers\AuthController@all_data');
Route::post('/registration/submit/verify', 'App\Http\Controllers\VerifyController@input_code');
//
Route::post('/office/add', 'App\Http\Controllers\AdminProductController@add_prod');
Route::post('/office/edit', 'App\Http\Controllers\AdminProductController@edit_prod');
Route::post('/office/delete', 'App\Http\Controllers\AdminProductController@delete_prod');

Route::post('/catalog/basket', 'App\Http\Controllers\BasketController@add_basket')->name('addBasket');
Route::post('/office/delete_basket', 'App\Http\Controllers\UserOfficeController@delete_basket')->name('DeleteBasket');
Route::post('/office/delete_favorite', 'App\Http\Controllers\UserOfficeController@delete_favorite')->name('DeleteFavor');
Route::post('/catalog/favorite', 'App\Http\Controllers\BasketController@add_favorite')->name('AddFavorite');
Route::post('/office/order', 'App\Http\Controllers\UserOfficeController@add_order')->name('AddOrder');
Route::post('/catalog/search', 'App\Http\Controllers\ProductsController@search')->name('Search');
Route::post('/catalog/sort', 'App\Http\Controllers\ProductsController@sort')->name('Sort');
Route::post('/catalog/filtration', 'App\Http\Controllers\ProductsController@filter')->name('Filter');

Route::get('send', 'App\Http\Controllers\MailController@send')->name('send');

Route::get('/catalog', 'App\Http\Controllers\ProductsController@all')->name('catalog_view');
Route::get('/office', 'App\Http\Controllers\WhoUser@all_user')->name('office_view');
//Route::get('/office', 'App\Http\Controllers\AdminProductController@all_name_prod');
