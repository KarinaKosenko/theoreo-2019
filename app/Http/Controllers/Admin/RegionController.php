<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddRegion;
use App\Http\Requests\EditRegion;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class RegionController extends Controller {
	protected $name = 'regions.';
	protected $folderPath = 'admin.pages.regions.';
	const QUERY_EXCEPTION_READABLE_MESSAGE = 2;

	public function index() {
		$all = Region::orderBy( 'name', 'asc' )->get();

		return view( $this->folderPath . 'index', [ 'all' => $all ] );
	}

	public function create() {
		$countries = Country::orderBy( 'name', 'asc' )->get();

		return view( $this->folderPath . 'create', [ 'countries' => $countries ] );
	}

	public function store( AddRegion $request ) {
		$request->merge( [ 'code' => $request->name ] );

		try {
			Region::create( $request->all() );
			$message = 'Добавление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[ self::QUERY_EXCEPTION_READABLE_MESSAGE ];
		}

		$request->session()->flash( 'message', $message );

		return Redirect::to( route( $this->name . 'index' ) );

	}

	public function show( $id ) {
		$single  = Region::findOrFail( $id );
		$country = Country::findOrFail( $single->country_id );

		return view( $this->folderPath . 'show', [ 'single' => $single, 'country' => $country ] );
	}

	public function edit( $id ) {
		$single    = Region::findOrFail( $id );
		$countries = Country::orderBy( 'name', 'asc' )->get();

		return view( $this->folderPath . 'edit', [ 'single' => $single, 'countries' => $countries ] );
	}

	public function update( EditRegion $request, $id ) {
		$method = $request->input( 'method' );

		$single = Region::findOrFail( $id );
		try {
			$single->update( [ 'name'       => $request->name,
			                   'code'       => $request->name,
			                   'country_id' => $request->country_id
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
		$single = Region::findOrFail( $id );

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
