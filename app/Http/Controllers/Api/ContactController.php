<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\MailSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {
	//

	/**
	 * @var Contact
	 */
	private $contact;
	/**
	 * @var MailSetting
	 */
	private $mailSetting;

	public function __construct(Contact $contact, MailSetting $mailSetting) {

		$this->contact = $contact;
		$this->mailSetting = $mailSetting;
	}

	public function message(Request $request) {


		$data = $request->all();

		$response = $this->contact->create($data);
		$mailSetting = $this->mailSetting->with(['mailOption'])->whereMailOptionId(2)->first();

		Mail::send($mailSetting->mailOption->template_admin, ['data' => $data], function ($m) use ($data, $mailSetting) {

			$subject = 'Website Contact us Form';
			$m->from($data['email_address'], $mailSetting->from_sender)
				->to($mailSetting->to)
				->cc(json_decode($mailSetting->cc, true))
				->subject($subject);
		});


		return response()->json($data, 200);
	}
}
