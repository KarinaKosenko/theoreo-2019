<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddTag;
use App\Http\Requests\EditTag;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TagController extends Controller {
	protected $name = 'tags.';
	protected $folderPath = 'admin.pages.tags.';
	const QUERY_EXCEPTION_READABLE_MESSAGE = 2;

	public function index() {
		$all = Tag::orderBy( 'name', 'asc' )->get();

		return view( $this->folderPath . 'index', [ 'all' => $all ] );
	}

	public function create() {
		return view( $this->folderPath . 'create' );
	}

	public function store( AddTag $request ) {
		$request->merge( [ 'code' => $request->name ] );

		try {
			Tag::create( $request->all() );
			$message = 'Добавление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[ self::QUERY_EXCEPTION_READABLE_MESSAGE ];
		}

		$request->session()->flash( 'message', $message );

		return Redirect::to( route( $this->name . 'index' ) );

	}

	public function show( $id ) {
		$single = Tag::findOrFail( $id );

		return view( $this->folderPath . 'show', [ 'single' => $single ] );
	}

	public function edit( $id ) {
		$single = Tag::findOrFail( $id );

		return view( $this->folderPath . 'edit', [ 'single' => $single ] );
	}

	public function update( EditTag $request, $id ) {
		$method = $request->input( 'method' );

		$single = Tag::findOrFail( $id );
		try {
			$single->update( [ 'name' => $request->name, 'code' => $request->name ] );
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
		$single = Tag::findOrFail( $id );

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
