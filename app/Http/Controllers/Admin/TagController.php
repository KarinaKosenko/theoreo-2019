<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddTag;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TagController extends Controller {
	protected $folderPath = 'admin.tags.';

	public function formAddTag() {
		return view( $this->folderPath . 'formAddTag' );
	}

	public function addTag( AddTag $request ) {
		$values         = $request->except( '_token' );
		$values['code'] = Str::slug( $values['name'], '-' );

		try {
			Tag::create( $values );
			$message = 'Тег успешно добавлен!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}


		return view( $this->folderPath . 'formAddTag', [ 'message' => $message ] );

	}
}
