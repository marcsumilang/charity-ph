<?php

namespace App\Repositories\PayPal\Contracts;

interface PayPalInterface {


	public function checkout($data);

	public function paymentExecution($data);

}