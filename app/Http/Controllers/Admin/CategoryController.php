<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class CategoryController extends Controller {
	protected $folderPath = 'admin.categories.';

	public function formAddCategory() {
		return view( $this->folderPath . 'formAddCategory' );
	}

	public function addCategory( AddCategory $request ) {
		$values         = $request->except( '_token' );
		$values['code'] = Str::slug( $values['name'], '-' );

		try {
			Category::create( $values );
			$message = 'Категория успешно добавлена!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}

		return view( $this->folderPath . 'formAddCategory', [ 'message' => $message ] );

	}
}
