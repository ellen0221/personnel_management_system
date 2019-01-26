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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

$this->get('login', function (){
    return view('auth.login');
});
$this->post('login', 'StaffController@authenticate');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');

$this->get('reset', 'StaffController@reset');
$this->post('reset', 'StaffController@reset');


//$this->get('staffreset', function (){
//    return view('staff.reset');
//});
$this->any('staffreset', 'UserController@reset');

$this->get('stafflogin', function (){
    return view('auth.login');
});
$this->post('stafflogin', 'UserController@staffauthenticate');
$this->post('stafflogout', 'UserController@logout');
$this->post('logout', 'StaffController@logout')->name('logout');

//Route::any('info/index', 'StaffController@index')->middleware('auth');

// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'StaffController@createstaff');

// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');

//Route::get('/home', 'HomeController@index')->name('home');

//Route::any('/staff/testindex/{id}', 'UserController@index');


Route::any('captcha/{tmp}', 'CodeController@captcha');
