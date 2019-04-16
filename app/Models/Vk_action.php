<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vk_action extends Model
{
    protected $guarded = [
         'created_at', 'updated_at'
    ];

    public function vk_action_photo()
    {
        return $this->hasOne('App\Models\Vk_action_photo');
    }
}
