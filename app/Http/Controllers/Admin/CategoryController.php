<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller {
	protected $folderPath = 'admin.categories.';

	public function formAddCategory() {
		return view( $this->folderPath . 'formAddCategory' );
	}

	public function addCategory( AddCategory $request ) {

		$name = $request->input( 'name' );
		$code = Str::slug( $name, '-' );

		$new = Category::create( [
			'name' => $name,
			'code' => $code
		] );

		if ( $new ) {
			$message = 'Категория успешно добавлена!';
		} else {
			$message = 'Не удалось добавить категорию, попробуйте еще раз!';
		}

		return view( $this->folderPath . 'formAddCategory', [ 'message' => $message ] );

	}
}
