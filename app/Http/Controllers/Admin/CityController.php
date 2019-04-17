<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddCity;
use App\Http\Requests\EditCity;
use App\Models\City;
use App\Models\Region;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CityController extends Controller {
	protected $name = 'cities.';
	protected $folderPath = 'admin.pages.cities.';
	const QUERY_EXCEPTION_READABLE_MESSAGE = 2;

	public function index() {
		$all = City::orderBy( 'name', 'asc' )->get();

		return view( $this->folderPath . 'index', [ 'all' => $all ] );
	}

	public function create() {
		$regions = Region::orderBy( 'name', 'asc' )->get();

		return view( $this->folderPath . 'create', [ 'regions' => $regions ] );
	}

	public function store( AddCity $request ) {
		$request->merge( [ 'code' => $request->name ] );

		try {
			City::create( $request->all() );
			$message = 'Добавление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[ self::QUERY_EXCEPTION_READABLE_MESSAGE ];
		}

		$request->session()->flash( 'message', $message );

		return Redirect::to( route( $this->name . 'index' ) );

	}

	public function show( $id ) {
		$single = City::findOrFail( $id );
		$region = Region::findOrFail( $single->region_id );

		return view( $this->folderPath . 'show', [ 'single' => $single, 'region' => $region ] );
	}

	public function edit( $id ) {
		$single  = City::findOrFail( $id );
		$regions = Region::orderBy( 'name', 'asc' )->get();

		return view( $this->folderPath . 'edit', [ 'single' => $single, 'regions' => $regions ] );
	}

	public function update( EditCity $request, $id ) {
		$method = $request->input( 'method' );

		$single = City::findOrFail( $id );
		try {
			$single->update( [ 'name'      => $request->name,
			                   'code'      => $request->name,
			                   'region_id' => $request->region_id
			] );
			$message = 'Обновление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[ self::QUERY_EXCEPTION_READABLE_MESSAGE ];
		}

		$request->session()->flash( 'message', $message );

		if ( $method == 'Применить' ) {
			return Redirect::to( route( $this->name . 'edit', [ 'id' => $id ] ) );
		}

		return Redirect::to( route( $this->name . 'index' ) );

	}


	public function destroy( $id ) {
		$single = City::findOrFail( $id );

		try {
			$single->delete();
			$message = 'Удаление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[ self::QUERY_EXCEPTION_READABLE_MESSAGE ];
		}

		Session::flash( 'message', $message );

		return Redirect::to( route( $this->name . 'index' ) );

	}
}
