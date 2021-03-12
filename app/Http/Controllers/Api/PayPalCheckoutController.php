<?php

namespace App\Http\Controllers\Api;

use App\Repositories\PayPal\Contracts\PayPalInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class PayPalCheckoutController extends Controller {
	//

	/**
	 * @var PayPalInterface
	 */
	private $payPalInterface;

	public function __construct(PayPalInterface $payPalInterface) {

		$this->payPalInterface = $payPalInterface;


	}


	public function postPayment(Request $request) {


		$data = $request->all();


		$response = $this->payPalInterface->checkout($data);


		return response()->json($response, 200);


	}

	public function executePayment(Request $request) {

		$data = $request->all();

		$response = $this->payPalInterface->paymentExecution($data);

		$inputs = [
			"status_option_id" => $response['status'] ? 2 : 3,
			"id"               => $data['payment_record_id'],
			"payment_id"       => $data['paymentId'],
		];


		$ch = curl_init($data['client_url']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($inputs));
		$exec = curl_exec($ch);
		return redirect($response['status'] ? '/payment/success' : '/payment/cancelled');

	}

}
