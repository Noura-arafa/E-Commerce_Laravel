<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    // product has many to many relation with order
    public function orders() {
        return $this->belongsToMany(Order::class);
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
