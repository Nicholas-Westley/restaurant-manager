<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = ['accepted', 'ready', 'served'];

    /* RELATIONSHIP */
    public function orderItems() {
        return $this->hasMany('App\OrderItem');
    }
}
