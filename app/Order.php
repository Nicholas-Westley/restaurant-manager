<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = ['accepted', 'ready', 'served', 'recipe_id'];

    /* RELATIONSHIP */
    public function recipe() {
        return $this->belongsTo('App\Recipe');
    }
}
