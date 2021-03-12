<?php

use App\StatusOption;
use Illuminate\Database\Seeder;

class StatusOptionSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//

		//
		// Let's clear the users table first
		StatusOption::truncate();


		$inputs = [
			['name' => 'Pending'],
			['name' => 'Success'],
			['name' => 'Approved'],
			['name' => 'Cancelled'],
		];

		StatusOption::insert($inputs);

	}
}
