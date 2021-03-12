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

$router->get('/', 'PublicPagesController@app');
$router->get('donate', 'PublicPagesController@app');
$router->get('career', 'PublicPagesController@app');


$router->group(['prefix' => "payment"], function($router){
	$router->get('success', 'PublicPagesController@app');
	$router->get('cancelled', 'PublicPagesController@app');
	$router->get('deposit', 'PublicPagesController@app');
});

Auth::routes();


$router->get('cache' , function (){
	\Artisan::call('config:cache');
});


$router->group(['prefix' => \Config::get('urlsegment.admin_prefix'), 'namespace' => 'Admin\Auth'], function ($router) {

	$router->get('login', 'LoginController@showLoginForm')->name(\Config::get('urlsegment.admin_prefix') . '.login');
	$router->post('login', 'LoginController@login');
	$router->get('logout', 'LoginController@logout');

//	$router->post('admin-password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//	$router->get('admin-password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//	$router->post('admin-password/reset', 'ResetPasswordController@reset');
//	$router->get('admin-password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
});


