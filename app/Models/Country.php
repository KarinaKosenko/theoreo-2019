<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Country extends Model {
	protected $guarded = [ 'id', 'created_at', 'updated_at', 'deleted_at' ];

	public function region() {
		return $this->hasMany( 'App\Models\Region' );
	}

	public function setCodeAttribute( $value ) {
		$this->attributes['code'] = Str::slug( $value, '-' );
	}

}
