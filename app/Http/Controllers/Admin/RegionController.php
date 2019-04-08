<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddRegion;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegionController extends Controller {
	protected $folderPath = 'admin.forms.';

	public function formAddRegion() {
		$countries = Country::orderBy( 'created_at', 'desc' )->get();

		return view( $this->folderPath . 'formAddRegion', [ 'countries' => $countries ] );
	}

	public function addRegion( AddRegion $request ) {
		$values         = $request->except( '_token' );
		$values['code'] = Str::slug( $values['name'], '-' );
		$countries      = Country::orderBy( 'name', 'asc' )->get();

		try {
			Region::create( $values );
			$message = 'Регион успешно добавлен!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}


		return view( $this->folderPath . 'formAddRegion', [ 'message' => $message, 'countries' => $countries ] );

	}
}
