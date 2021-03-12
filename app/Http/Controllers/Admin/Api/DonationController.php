<?php

namespace App\Http\Controllers\Admin\Api;


use App\Donation;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\CareerRequest;
use App\PaymentRecord;
use App\Repositories\Cms\CmsRepository;
use Illuminate\Http\Request;


class DonationController extends BaseController {

	private $cmsRepository;
	/**
	 * @var Donation
	 */
	private $model;
	/**
	 * @var PaymentRecord
	 */
	private $paymentRecord;

	public function __construct(Donation $model, PaymentRecord $paymentRecord) {
		// set the model
		$this->cmsRepository = new CmsRepository($model);
		$this->model = $model;
		$this->paymentRecord = $paymentRecord;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		//
		$data = $request->all();

		$response = $this->cmsRepository->getModel()->with([

			'hasOnePaymentRecord' => function ($query) {
				$query->with(['paymentMethod', 'statusOption']);
			},

		])->orderBy('id','DESC');

		if (isset($data['keyword'])) {


			$response = $response->where('first_name', 'LIKE', '%' . $data['keyword'] . '%');
		}

		$response = $response->paginate(10);

		return response()->json($response, 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
//	    return view('admin.app');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$data = $request->all();


		$this->cmsRepository->create($data);

		return response()->json($data, 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//

		$response = $this->cmsRepository->show($id);

		return response()->json($response, 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//


		$data = $request->all();

		$response = $this->cmsRepository->getModel()->find($data['id']);
		$response->fill($data)->save();


		foreach ([$data['has_one_payment_record']] as $key => $value) {

			$payment = $this->paymentRecord->find($value['id']);
			$payment->fill($value)->save();
		}

		return response()->json($data, 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//

		$this->cmsRepository->delete($id);

		return response()->json(true, 200);


	}
}
