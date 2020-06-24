<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function size(){
        return $this->belongsTo(Size::class);
    }
}
