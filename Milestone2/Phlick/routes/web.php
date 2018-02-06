<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::get('/', function () {
    return view('Guest/welcome');
});

Route::get('/Index', function(){
    return view('Guest/welcome');
});

Route::get('/Login', function () {
    return view('Guest/Login');
});

Route::get('/Register', function () {
    return view('Guest/Register');
});

Route::get('/Edit', function(){
    return view('User/EditProfile');
});

Route::get('/Logout', 'LogoutController@logout');

Route::get('/Home', 'HomeController@goHome');

Route::post('/register','Auth\RegisterController@register');

Route::post('/login','Auth\LoginController@login');

