<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCountry;
use App\Models\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller {
	protected $folderPath = 'admin.forms.';

	public function formAddCountry() {
		return view( $this->folderPath . 'formAddCountry' );
	}

	public function addCountry( AddCountry $request ) {
		$values         = $request->except( '_token' );
		$values['code'] = Str::slug( $values['name'], '-' );

		try {
			Country::create( $values );
			$message = 'Страна успешно добавлена!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}


		return view( $this->folderPath . 'formAddCountry', [ 'message' => $message ] );

	}
}
