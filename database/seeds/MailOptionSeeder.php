<?php

use App\MailOption;
use Illuminate\Database\Seeder;

class MailOptionSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//

		MailOption::truncate();

		$inputs = [

			[
				"name"           => "Careers",
				"template_user"  => "emails.career.user-apply",
				"template_admin" => "emails.career.admin-apply",
			],
			[
				"name"           => "Contact",
				"template_user"  => "emails.contact.user-contact",
				"template_admin" => "emails.contact.admin-contact",
			],
			[
				"name"           => "Donate",
				"template_user"  => "emails.donate.user-donate",
				"template_admin" => "emails.donate.admin-donate",
			],

		];

		MailOption::insert($inputs);
	}
}
