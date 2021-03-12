<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//
//$router->group(['prefix' => "payment"], function($router){
//
//});


$router->group(['prefix' => "contact"], function ($router) {
	$router->post('message', 'ContactController@message');
});

$router->get('test/{id}','DonateController@test');

$router->group(['prefix' => "career"], function ($router) {

	$router->post('apply', 'CareerController@apply');
	$router->get('jobs', 'CareerController@jobs');

});


$router->group(['prefix' => "resources"], function ($router) {


	$router->get('get-status-options', 'ResourcesController@getStatusOptions');
	$router->get('get-mail-options', 'ResourcesController@getMailOptions');
});

$router->group(['prefix' => "checkout"], function ($router) {


	$router->resources([

		'donates' => 'DonateController',


	]);


	$router->group(['prefix' => "payment"], function ($router) {


		$router->group(['prefix' => "paypal"], function ($router) {
			$router->post('/', 'PayPalCheckoutController@postPayment');
			$router->get('execute', 'PayPalCheckoutController@executePayment');
		});


	});


});

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});



