<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }

    public function sizes(){
        return $this->hasMany(Size::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
