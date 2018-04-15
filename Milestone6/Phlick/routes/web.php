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

Route::get('/Jobs', function(){
    return view('User/Jobs');
});

Route::get('/Cart', function(){
    return view('User/ViewCart');
});

Route::get('/addjob', function(){
    return view('Company/EditJob');
});

Route::get('/addgroup', function(){
    return view('Admin/EditGroup');
});

Route::get('/EditGroup', function(){
    return view('Admin/EditGroup');
});

Route::get('/EditJob', function(){
    return view('Company/EditJob');
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

Route::post('/PDF/{option}/{uid}/{rid}', 'PDFController@index');

Route::get('/PDF/{option}/{uid}/{rid}', 'PDFController@index');

Route::get('/DeleteGroup/{id}', 'GroupController@deleteGroup');

Route::get('/DeleteJob/{id}', 'JobController@deleteJob');

Route::get('/deleteresume/{id}', 'ResumeController@deleteResume');

Route::get('/submitresume/{uid}/{jid}', 'ResumeController@submitResume');

Route::get('/addtocart/{uid}/{jid}', 'JobController@addToCart');

Route::get('/deletecart/{uid}/{jid}', 'JobController@removeJob');

Route::get('/submitcart/{id}', 'ResumeController@submitCart');

Route::get('/viewgroup/{id}', 'GroupController@viewGroup');

Route::get('/viewjob/{id}', 'JobController@viewJob');

Route::get('/viewcompany/{id}', 'SearchController@viewComp');

Route::post('/NewGroup', 'GroupController@addGroup');

Route::post('/NewJob', 'JobController@addJob');

Route::post('/editgroup/{id}', 'GroupController@editGroup');

Route::post('/editjob/{id}', 'GroupController@editJob');

Route::post('/searchall', 'SearchController@search');

Route::get('/searchall/{search}', 'SearchController@searchAll');

Route::get('/searchgroups/{search}', 'SearchController@searchGroups');

Route::get('/searchcomp/{search}', 'SearchController@searchComp');

Route::get('/searchjobs/{search}', 'SearchController@searchJobs');

Route::post('/filterpay/{filter}', 'JobController@filterPay');

Route::post('/filterpay', 'JobController@filterPayNo');

Route::get('/filterfull/{pay1}/{pay2}', 'JobController@filterFull');

Route::get('filterfull', 'JobController@filterFullNo');

Route::get('/filterpart/{pay1}/{pay2}', 'JobController@filterPart');

Route::get('/filterpart', 'JobController@filterPartNo');

Route::get('/filterseas/{pay1}/{pay2}', 'JobController@filterSeas');

Route::get('/filterseas', 'JobController@filterSeasNo');

Route::get('/filterinter/{pay1}/{pay2}', 'JobController@filterInter');

Route::get('filterinter', 'JobController@filterInterNo');

Route::get('/joingroup/{id}', 'GroupController@joinGroup');

Route::get('/leavegroup/{id}', 'GroupController@leaveGroup');