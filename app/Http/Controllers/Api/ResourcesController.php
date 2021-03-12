<?php

namespace App\Http\Controllers\Api;

use App\MailOption;

use App\StatusOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourcesController extends Controller {
	//

	/**
	 * @var StatusOption
	 */
	private $statusOption;
	private $mailOption;


	/**
	 * ResourcesController constructor.
	 * @param StatusOption $statusOption
	 * @param MailOption $mailOption
	 */
	public function __construct(StatusOption $statusOption, MailOption $mailOption) {

		$this->statusOption = $statusOption;
		$this->mailOption = $mailOption;
	}


	public function getStatusOptions() {
		$response = $this->statusOption->get();

		return response()->json($response,200);
	}


	public function getMailOptions(){

		$response = $this->mailOption->get();

		return response()->json($response,200);
	}
}
