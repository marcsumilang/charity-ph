<?php

$router->get('/{any}', 'AdminPagesController@index')->where('any', '.*');
//$router->resources([
//	'samples' => 'SampleController',
//]);