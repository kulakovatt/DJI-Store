<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistController;

Route::get('/', function () {
    return view('header');
})->name('home');

Route::get('/catalog', function () {
    return view('header');
});

Route::get('/registration', function () {
    return view('regist');
});
Route::get('/autorization', function () {
    return view('auth');
})->name('auth');

//Route::get('/send', function () {
//
//})->name('send');
Route::get('/verify', function () {
    return view('verify');
})->name('verify');

Route::post('/registration/submit', 'App\Http\Controllers\RegistController@submit');
Route::post('/autorization/submit', 'App\Http\Controllers\AuthController@all_data');
Route::post('/registration/submit/verify', 'App\Http\Controllers\VerifyController@input_code');
Route::get('send', 'App\Http\Controllers\MailController@send')->name('send');
