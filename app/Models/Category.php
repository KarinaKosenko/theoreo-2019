<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model {
	protected $guarded = [ 'id', 'created_at', 'updated_at', 'deleted_at' ];

	public function brands() {
		return $this->belongsToMany( 'App\Models\Brand' );
	}

	public function actions() {
		return $this->hasMany( 'App\Models\Action' );
	}

	public function setCodeAttribute( $value ) {
		$this->attributes['code'] = Str::slug( $value, '-' );
	}
}
