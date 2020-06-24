<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'full_name',
        'address',
        'delivery_date',
    ];

    public function pizzas(){
        return $this->hasMany(Pizza::class);
    }
    public function sizes(){
        return $this->hasMany(Size::class);
    }
}
