<?php

use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});

Route::get('/Home', function(){
    return view('welcome');
});

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Register', function () {
    return view('Register');
});

Route::get('/Admin', function(){
    $users = DB::table('users')->get();
    return view('Admin', ['users' => $users]);
});

Route::get('/Delete/{id}', function($id){
    DB::table('users')->where('ID', '=', $id)->delete();
    return redirect('/Admin');
});

Route::post('/register','Auth\RegisterController@register');

Route::post('/login','Auth\LoginController@login');