<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {
    /* RELATIONSHIP */
    public function order() {
        return $this->belongsTo('App\Order');
    }
    /* RELATIONSHIP */
    public function recipe() {
        return $this->belongsTo('App\Recipe');
    }
    /* RELATIONSHIP */
    public function orderItemIngredientMaps() {
        return $this->hasMany('App\OrderItemIngredientMap');
    }
}
