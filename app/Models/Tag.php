<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model {
	protected $guarded = [ 'id', 'created_at', 'updated_at' ];

	public function actions() {
		return $this->belongsToMany( 'App\Models\Action' );
	}

	public function setCodeAttribute( $value ) {
		$this->attributes['code'] = Str::slug( $value, '-' );
	}

}
