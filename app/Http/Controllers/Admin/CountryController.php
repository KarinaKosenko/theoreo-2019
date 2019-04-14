<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCountry;
use App\Models\Country;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CountryController extends Controller {
	protected $folderPath = 'admin.country.';

	public function index() {
		$countries = Country::all();

		return view( $this->folderPath . 'index', [ 'all' => $countries ] );
	}

	public function formAddCountry() {
		return view( $this->folderPath . 'create' );
	}

	public function store( AddCountry $request ) {
		$values         = $request->except( '_token' );
		$values['code'] = Str::slug( $values['name'], '-' );

		try {
			Country::create( $values );
			$message = 'Добавление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}

		$request->session()->flash( 'message', $message );

		return Redirect::to( route( 'createCountry' ) );

	}

	public function show( $id ) {
		$country = Country::findOrFail( $id );

		return view( $this->folderPath . 'show', [ 'country' => $country ] );
	}

	public function edit( $id ) {
		$country = Country::findOrFail( $id );

		return view( $this->folderPath . 'edit', [ 'country' => $country ] );
	}

	public function update( AddCountry $request ) {
		$name    = $request->input( 'name' );
		$id      = $request->input( 'id' );
		$country = Country::findOrFail( $id );
		try {
			$country->name = $name;
			$country->code = Str::slug( $name, '-' );
			$country->save();
			$message = 'Обновление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}

		$request->session()->flash( 'message', $message );

		return Redirect::to( route( 'editCountry', [ 'id' => $id ] ) );

	}

	public function destroyForm() {
		$countries = Country::all();

		return view( $this->folderPath . 'destroy', [ 'countries' => $countries ] );
	}

	public function destroy( \Illuminate\Http\Request $request ) {
		$id      = $request->id;
		$country = Country::findOrFail( $id );

		try {
			$country->delete();
			$message = 'Удаление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}

		Session::flash( 'message', $message );

		return Redirect::to( route( 'destroyFormCountry' ) );

	}


}
