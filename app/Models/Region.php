<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Region extends Model {
	protected $guarded = [ 'id', 'created_at', 'updated_at', 'deleted_at' ];

	public function city() {
		return $this->hasMany( 'App\Models\City' );
	}

	public function country() {
		return $this->belongsTo( 'App\Models\Country' );
	}

	public function setCodeAttribute( $value ) {
		$this->attributes['code'] = Str::slug( $value, '-' );
	}
}