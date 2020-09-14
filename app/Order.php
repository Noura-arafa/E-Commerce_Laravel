<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    // order hold user_id so use belongs to
    public function client() {
        return $this->belongsTo('App\Client');
    }
}
