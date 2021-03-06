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

Route::get('/Groups', function(){
    return view('User/Groups');
});

Route::get('/addgroup', function(){
    return view('Admin/EditGroup');
});

Route::get('/Logout', 'LogoutController@logout');

Route::get('/Home', 'HomeController@goHome');

Route::post('/register','Auth\RegisterController@register');

Route::post('/login','Auth\LoginController@login');

Route::post('/name', 'EditController@changeName');

Route::post('/email', 'EditController@changeEmail');

Route::post('/password', 'EditController@changePass');

Route::post('/dob', 'EditController@changeDOB');

Route::post('/gender', 'EditController@changeGender');

Route::post('/ethnicity', 'EditController@changeEthnicity');

Route::post('/location', 'EditController@changeLocation');

Route::post('/number', 'EditController@changeNumber');

Route::post('/education', 'EditController@changeEducation');

Route::post('/job', 'EditController@changeJob');

Route::get('/Delete/{id}', 'AccountController@deleteAccount');

Route::get('/Suspend/{id}', 'AccountController@suspendAccount');

Route::get('/Resume/{view}', 'ResumeController@route');

Route::post('/objective', 'ResumeController@objective');

Route::post('/address', 'ResumeController@address');

Route::post('/experience', 'ResumeController@experience');

Route::post('/education', 'ResumeController@education');

Route::post('/skills', 'ResumeController@skills');

Route::post('/PDF/{option}', 'PDFController@index');

Route::get('/PDF/{option}', 'PDFController@index');

Route::get('/DeleteGroup/{id}', 'GroupController@deleteGroup');

Route::get('/viewgroup/{id}', 'GroupController@viewGroup');

Route::post('/NewGroup', 'GroupController@addGroup');

Route::get('/EditGroup', function(){
    return view('Admin/EditGroup');
});

Route::post('/editgroup/{id}', 'GroupController@editGroup');

Route::post('/searchgroups', 'GroupController@search');

Route::get('/joingroup/{id}', 'GroupController@joinGroup');

Route::get('/leavegroup/{id}', 'GroupController@leaveGroup');