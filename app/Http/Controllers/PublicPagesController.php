<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPagesController extends Controller
{
    //


	public function app(){

		return view('app');
	}
}
