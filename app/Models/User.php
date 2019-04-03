<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function permissions()
    {
        $permissions=[];
        foreach ($this->roles as $role){
            foreach($role->permissions as $perm){
                $permissions[]=$perm->code;
            }
        }
        return $permissions;
    }
	public function userinfo() {
		return $this->hasOne( 'App\Models\Userinfo' );
	}

	public function city() {
		return $this->belongsTo( 'App\Models\City' );
	}

}
