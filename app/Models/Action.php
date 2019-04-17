<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $guarded = ['id', 'code', 'created_at', 'updated_at', 'deleted_at'];

    protected $with = ['tags', 'brand', 'category'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function cities()
    {
        return $this->belongsToMany('App\Models\City');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    function scopeIndate($query)
    {
        return $query->where('date_end', '>=', date('Y-m-d'))
            ->where('date_start', '<=', date('Y-m-d H:i:s'));
    }

    function scopeSort($query, $sort)
    {
        $field = 'created_at';
        if ($sort == 'rating') {
            $field = 'rating';
        }
        return $query->orderBy($field, 'DESC');
    }
}