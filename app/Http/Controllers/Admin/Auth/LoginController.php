<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


class LoginController extends Controller {

	/**
	 * @var Admin
	 */
	private $admin;

	/*
|--------------------------------------------------------------------------
| Login Controller
|--------------------------------------------------------------------------
|
| This controller handles authenticating users for the application and
| redirecting them to your home screen. The controller uses a trait
| to conveniently provide its functionality to your applications.
|
*/
	use AuthenticatesUsers;
	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */


	public function __construct(Admin $admin) {

		$this->admin = $admin;
		$this->redirectTo = \Config::get('urlsegment.admin_prefix') . '/dashboard';
	}

	/**
	 * Show the application's login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showLoginForm() {
		if (Auth::guard('admin')->check()) {

			return redirect('/' . $this->redirectTo);
		}

		return view('admin.app');
	}

	/**
	 * Get the guard to be used during authentication.
	 *
	 * @return \Illuminate\Contracts\Auth\StatefulGuard
	 */

	public function logout(){
		Auth::guard('admin')->logout();
		return redirect(url($this->redirectTo));
	}

	public function login(Request $request) {

		$credentials = $request->only('email', 'password');

		// returns json response if login credentials are correct.
		if (Auth::guard('admin')->attempt($credentials)) {
			return response()->json([
//				'auth' => $auth,
				'intended' => URL::previous(),
				'message'  => "Login Success",
				'data'     => $this->admin->find(Auth::guard('admin')->user()->id),
			], 200);

		} else { // returns json response if login credentials are incorrect
			return response()->json([
//				'auth' => $auth,
				'intended' => URL::previous(),
				'message'  => "invalid_credentials",
				'data'     => [],
				"errors"   => [["Invalid Email Address or Password"]],
			], 422);
		}
	}

	protected function guard() {
		return Auth::guard('admin');
	}


}