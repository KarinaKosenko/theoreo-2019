<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddBrand;
use App\Models\Brand;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandController extends Controller {
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
		$types                = self::getPossibleEnumValues( 'brands', 'type' );
		$typesWithDescription = [];
		foreach ( $types as $type ) {
			if ( $type == 'federal_brand' ) {
				$typesWithDescription[ $type ] = 'Федеральный бренд';
			} else if ( $type == 'internet_shop' ) {
				$typesWithDescription[ $type ] = 'Интернет магазин';
			}
		}

		return $typesWithDescription;
	}

	public function formAddBrand() {
		$types = $this->getTypes();
		debug( $types );

		return view( $this->folderPath . 'formAddBrand', [ 'types' => $types ] );
	}

	public function addBrand( AddBrand $request ) {
		$values         = $request->except( '_token' );
		$values['code'] = Str::slug( $values['name'], '-' );
		$types          = $this->getTypes();
		debug( $values );
		try {
			Brand::create( $values );
			$message = 'Бренд успешно добавлен!';
		} catch ( QueryException $exception ) {
			$message = $exception->errorInfo[2];
		}

		return view( $this->folderPath . 'formAddBrand', [ 'message' => $message, 'types' => $types ] );
	}
}
