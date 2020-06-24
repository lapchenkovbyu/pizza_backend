<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }

    public function price(){
        return $this->hasMany(Price::class);
    }
}
