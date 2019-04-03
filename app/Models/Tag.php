<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
	protected $guarded = [ 'id', 'code', 'created_at', 'updated_at' ];

	public function actions() {
		return $this->belongsToMany( 'App\Models\Action' );
	}

}
