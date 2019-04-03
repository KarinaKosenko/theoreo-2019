<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
	protected $guarded = [ 'id', 'code', 'created_at', 'updated_at', 'deleted_at' ];

	public function region() {
		return $this->belongsTo( 'App\Models\Region' );
	}

	public function user() {
		return $this->hasMany( 'App\Models\User' );
	}

	public function actions() {
		return $this->belongsToMany( 'App\Models\Action' );
	}

	public function brands() {
		return $this->belongsToMany( 'App\Models\Brand' );
	}

}