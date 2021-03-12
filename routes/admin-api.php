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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->group(['prefix' => "upload"], function($router){

	$router->post('image', 'UploadController@uploadImage');

});




$router->resources([

    'admins' => 'AdminController',
    'careers' => 'CareerController',
    'donations' => 'DonationController',
    'contacts' => 'ContactController',
    'mail-settings' => 'MailSettingController',

]);


