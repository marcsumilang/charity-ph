<?php

namespace App\Http\Controllers\Admin\Api;

use App\Admin;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Cms\CmsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends BaseController {

	private $cmsRepository;

	public function __construct(Admin $model) {
		// set the model
		$this->cmsRepository = new CmsRepository($model);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request) {
		//
		$data = $request->all();

		$response = $this->cmsRepository->getModel();

		if (isset($data['keyword'])) {


			$response = $response->where('name', 'LIKE', '%' . $data['keyword']. '%')->orderBy('id','DESC');
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
	public function store(AdminRequest $request) {

		$data = $request->all();
		unset($data['password_confirmation']);
		$data['username'] =  $data['email'];
		$data['password'] = bcrypt($data['password']);

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
	public function update(AdminRequest $request, $id) {
		//
		$data = $request->all();
		$this->cmsRepository->update($data, $id);

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
