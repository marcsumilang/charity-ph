<?php

use App\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//


		//
		// Let's clear the users table first
		PaymentMethod::truncate();


		$inputs = [
			['name' => 'Bank Deposit'],
			['name' => 'PayPal - Checkout'],
		];
		PaymentMethod::insert($inputs);
	}
}
