<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public function subs()
    {
        return $this->hasMany('App\Sub');
    }
}
