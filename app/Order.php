<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items(){
        return $this->hasMany('\App\Item');
    }

    public function user(){
        return $this->belongsTo('\App\User');
    }
}
