<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCountry;
use App\Models\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CountryController extends Controller {
	protected $name = 'countries.';
	protected $folderPath = 'admin.pages.countries.';

	public function index() {
		$all = Country::all();

		return view( $this->folderPath . 'index', [ 'all' => $all ] );
	}

	public function create() {
		return view( $this->folderPath . 'create' );
	}

	public function store( AddCountry $request ) {
		$values         = $request->all();
		$values['code'] = $values['name'];

		try {
			Country::create( $values );
			$message = 'Добавление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}

		$request->session()->flash( 'message', $message );

		return Redirect::to( route( $this->name . 'index' ) );

	}

	public function show( $id ) {
		$single = Country::findOrFail( $id );

		return view( $this->folderPath . 'show', [ 'single' => $single ] );
	}

	public function edit( $id ) {
		$single = Country::findOrFail( $id );

		return view( $this->folderPath . 'edit', [ 'single' => $single ] );
	}

	public function update( AddCountry $request, $id ) {
		$name   = $request->input( 'name' );
		$method = $request->input( 'method' );
		if ( $method == 'Назад' ) {
			return Redirect::to( route( $this->name . 'index' ) );
		}

		$single = Country::findOrFail( $id );
		try {
			$single->name = $name;
			$single->code = Str::slug( $name, '-' );
			$single->save();
			$message = 'Обновление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}

		$request->session()->flash( 'message', $message );

		if ( $method == 'Применить' ) {
			return Redirect::to( route( $this->name . 'edit', [ 'id' => $id ] ) );
		}

		return Redirect::to( route( $this->name . 'index' ) );

	}


	public function destroy( $id ) {
		$single = Country::findOrFail( $id );

		try {
			$single->delete();
			$message = 'Удаление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}

		Session::flash( 'message', $message );

		return Redirect::to( route( $this->name . 'index' ) );

	}


}