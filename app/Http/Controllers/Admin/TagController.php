<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TagController extends Controller {
	protected $folderPath = 'admin.tags.';

	public function formAddTag() {
		return view( $this->folderPath . 'formAddTag' );
	}

	public function addTag( AddTag $request ) {

		$name = $request->input( 'name' );
		$code = Str::slug( $name, '-' );

		$new = Tag::create( [
			'name' => $name,
			'code' => $code
		] );

		if ( $new ) {
			$message = 'Тег успешно добавлен!';
		} else {
			$message = 'Не удалось добавить тег, попробуйте еще раз!';
		}

		return view( $this->folderPath . 'formAddTag', [ 'message' => $message ] );

	}
}
