<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller {

	protected $folderPath = 'admin.action.';

	function addForm() {
		return view( $this->folderPath . 'addForm' );
	}
}
