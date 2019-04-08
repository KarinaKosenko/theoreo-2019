<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCity;
use App\Http\Requests\AddRegion;
use App\Models\City;
use App\Models\Region;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller {
	protected $folderPath = 'admin.forms.';

	public function formAddCity() {
		$regions = Region::orderBy( 'created_at', 'desc' )->get();

		return view( $this->folderPath . 'formAddCity', [ 'regions' => $regions ] );
	}

	public function addCity( AddCity $request ) {
		$regions        = Region::orderBy( 'name', 'asc' )->get();
		$values         = $request->except( '_token' );
		$values['code'] = Str::slug( $values['name'], '-' );

		try {
			City::create( $values );
			$message = 'Город успешно добавлен!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}


		return view( $this->folderPath . 'formAddCity', [ 'message' => $message, 'regions' => $regions ] );

	}

}
