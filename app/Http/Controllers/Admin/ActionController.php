<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddAction;
use App\Models\Action;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ActionController extends Controller {
	protected $folderPath = 'admin.forms.';

	public static function getPossibleEnumValues( $table, $name ) {
		$type = DB::select( DB::raw( 'SHOW COLUMNS FROM ' . $table . ' WHERE Field = "' . $name . '"' ) )[0]->Type;
		preg_match( '/^enum\((.*)\)$/', $type, $matches );
		$enum = array();
		foreach ( explode( ',', $matches[1] ) as $value ) {
			$v      = trim( $value, "'" );
			$enum[] = $v;
		}

		return $enum;
	}

	public function getTypes() {
		$types                = self::getPossibleEnumValues( 'actions', 'type' );
		$typesWithDescription = [];
		foreach ( $types as $type ) {
			if ( $type == 'discount' ) {
				$typesWithDescription[ $type ] = 'Скидка';
			} else if ( $type == 'sale' ) {
				$typesWithDescription[ $type ] = 'Распродажа';
			}
		}

		return $typesWithDescription;
	}

	public function formAddAction() {
		$types      = $this->getTypes();
		$brands     = Brand::orderBy( 'name', 'asc' )->get();
		$categories = Category::orderBy( 'name', 'asc' )->get();

		return view( $this->folderPath . 'formAddAction', [ 'types'      => $types,
		                                                    'brands'     => $brands,
		                                                    'categories' => $categories
		] );
	}

	public function addAction( AddAction $request ) {
		$brands     = Brand::orderBy( 'name', 'asc' )->get();
		$categories = Category::orderBy( 'name', 'asc' )->get();

		$values         = $request->except( '_token' );
		$values['code'] = Str::slug( $values['title'], '-' );
		$types          = $this->getTypes();

		try {
			$new       = Action::create( $values );
			$code      = $new->id . ':' . $values['code'];
			$new->code = $code;
			$new->save();
			$message = 'Акция успешно добавлена!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}

		return view( $this->folderPath . 'formAddAction', [ 'message'    => $message,
		                                                    'types'      => $types,
		                                                    'brands'     => $brands,
		                                                    'categories' => $categories
		] );
	}
}