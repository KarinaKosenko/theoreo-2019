<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function cities()
    {
        return $this->belongsToMany('App\Models\City');
    }

    public function actions()
    {
        return $this->hasMany('App\Models\Action');
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = Str::slug($value);
    }
}
