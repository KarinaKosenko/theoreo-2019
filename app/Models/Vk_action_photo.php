<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vk_action_photo extends Model
{
    protected $guarded = [
       'created_at', 'updated_at'
    ];

    public function vk_action()
    {
        return $this->belongsTo('App\Models\Vk_action');
    }


}
