<?php

namespace App\Http\Controllers;

class IndexController extends Controller {
	function show() {
		return view('charts.index');
	}
}
