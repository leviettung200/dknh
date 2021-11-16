<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    public function parent(){
        return $this->belongsTo("App\Major", 'parent_code','code');
    }

    public function students()
    {
        return $this->hasMany('App\Student','major_code','code');
    }

}
