<?php

namespace App\Http\Controllers\Api;

use App\Career;
use App\MailSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller {
	//


	/**
	 * @var Career
	 */
	private $career;
	/**
	 * @var MailSetting
	 */
	private $mailSetting;

	public function __construct(Career $career, MailSetting $mailSetting) {

		$this->career = $career;
		$this->mailSetting = $mailSetting;
	}

	public function jobs() {


		$response = $this->career->get();


		return response()->json($response, 200);

	}


	public function apply(Request $request) {
		$data = $request->all();
		$file = $request->file('resume');
		$mailSetting = $this->mailSetting->with(['mailOption'])->whereMailOptionId(1)->first();

		Mail::send($mailSetting->mailOption->template_admin, ['data' => $data], function ($m) use ($data, $mailSetting, $file) {

			$subject = 'Application for ' . $data['job'];

			$m->from($data['email_address'], $mailSetting->from_sender)
				->to($mailSetting->to)
				->cc(json_decode($mailSetting->cc, true))
				->subject($subject);

			if ($file) {
				$m->attach($file->getRealPath(), [
						'as'   => $file->getClientOriginalName(), // If you want you can chnage original name to custom name
						'mime' => $file->getMimeType(),
					]
				);
			}

		});

		Mail::send($mailSetting->mailOption->template_user, ['data' => $data], function ($m) use ($data, $mailSetting) {

			$subject = 'Application for ' . $data['job'];
			$m->from($mailSetting->from, $mailSetting->from_sender)
				->to($data['email_address'])
				->subject($subject);


		});


		return response()->json($data, 200);
	}


}
