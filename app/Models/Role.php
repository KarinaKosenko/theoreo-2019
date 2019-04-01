<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'code',
    ];

	public function user()
    {
	    return $this->belongsTo( 'App\Model\User' );
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}
