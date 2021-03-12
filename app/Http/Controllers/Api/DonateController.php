<?php

namespace App\Http\Controllers\Api;

use App\Donation;
use App\MailSetting;
use App\PaymentRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class DonateController extends Controller {
	//

	/**
	 * @var Donation
	 */
	private $donation;
	/**
	 * @var PaymentRecord
	 */
	private $paymentRecord;
	/**
	 * @var MailSetting
	 */
	private $mailSetting;

	public function __construct(Donation $donation, PaymentRecord $paymentRecord, MailSetting $mailSetting) {

		$this->donation = $donation;
		$this->paymentRecord = $paymentRecord;
		$this->mailSetting = $mailSetting;
	}

	public function store(Request $request) {
		$data = $request->all();


		$response = $this->donation->create($data);
		$response->has_one_payment_record = $response->hasOnePaymentRecord()->create($data['has_one_payment_record']);

		return response()->json($response, 200);
	}


	public function update($id, Request $request) {
		$data = $request->all();

		$response = $this->paymentRecord->with(['statusOption', 'table'])->find($id);
		$response->fill($data)->save();
		$mailSetting = $this->mailSetting->with(['mailOption'])->whereMailOptionId(3)->first();
//		if ($data['status_option_id'] == 2) {
//
//
			Mail::send($mailSetting->mailOption->template_admin, ['data' => $response], function ($m) use ($response, $mailSetting) {

				$subject = "Donation from  " . $response->table->first_name . " " . $response->table->last_name;

				$m->from($response->table->email_address, $mailSetting->from_sender)
					->to($mailSetting->to)
					->cc(json_decode($mailSetting->cc, true))
					->subject($subject);


			});


			Mail::send($mailSetting->mailOption->template_user, ['data' => $response], function ($m) use ($response, $mailSetting) {
				$subject = "Donation from  " . $response->table->first_name . " " . $response->table->last_name;
				$m->from($mailSetting->from, $mailSetting->from_sender)
					->to($response->table->email_address)
					->subject($subject);


			});

//		}
//
//		return $data;
	}


	public function test($id) {


		$response = $this->paymentRecord->with(['statusOption', 'table'])->find($id);
		$mailSetting = $this->mailSetting->with(['mailOption'])->whereMailOptionId(3)->first();

		if ($response->status_option_id == 2) {
//
//
			Mail::send($mailSetting->mailOption->template_admin, ['data' => $response], function ($m) use ($response, $mailSetting) {

				$subject = "Donation from  " . $response->table->first_name . " " . $response->table->last_name;

				$m->from($response->table->email_address, $mailSetting->from_sender)
					->to($mailSetting->to)
					->cc(json_decode($mailSetting->cc, true))
					->subject($subject);


			});


			Mail::send($mailSetting->mailOption->template_user, ['data' => $response], function ($m) use ($response, $mailSetting) {
				$subject = "Donation from  " . $response->table->first_name . " " . $response->table->last_name;
				$m->from($mailSetting->from, $mailSetting->from_sender)
					->to($response->table->email_address)
					->subject($subject);


			});
		}

		return $response;
	}

}
