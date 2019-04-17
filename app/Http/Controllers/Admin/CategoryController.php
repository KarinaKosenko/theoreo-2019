<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddCategory;
use App\Http\Requests\EditCategory;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller {
	protected $name = 'categories.';
	protected $folderPath = 'admin.pages.categories.';
	const QUERY_EXCEPTION_READABLE_MESSAGE = 2;

	public function index() {
		$all = Category::orderBy( 'name', 'asc' )->get();

		return view( $this->folderPath . 'index', [ 'all' => $all ] );
	}

	public function create() {
		return view( $this->folderPath . 'create' );
	}

	public function store( AddCategory $request ) {
		$request->merge( [ 'code' => $request->name ] );

		try {
			Category::create( $request->all() );
			$message = 'Добавление выполнено успешно!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[ self::QUERY_EXCEPTION_READABLE_MESSAGE ];
		}

		$request->session()->flash( 'message', $message );

		return Redirect::to( route( $this->name . 'index' ) );

	}

	public function show( $id ) {
		$single = Category::findOrFail( $id );

		return view( $this->folderPath . 'show', [ 'single' => $single ] );
	}

	public function edit( $id ) {
		$single = Category::findOrFail( $id );

		return view( $this->folderPath . 'edit', [ 'single' => $single ] );
	}

	public function update( EditCategory $request, $id ) {
		$method = $request->input( 'method' );

		$single = Category::findOrFail( $id );
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
		$single = Category::findOrFail( $id );

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
