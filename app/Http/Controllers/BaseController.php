<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class BaseController extends Controller {
	//
	public function makeSlug($name, $model) {

		$m = App::make($model);

		$slug = str_slug($name);

		$count = $m->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

		$s = $count ? "{$slug}-{$count}" : $slug;

		return $s;
	}


}


