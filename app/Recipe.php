<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model {
    /* RELATIONSHIP */
    public function ingredients() {
        return $this->hasMany('App\Ingredient');
    }
    /* RELATIONSHIP */
    public function orders() {
        return $this->belongsToMany('App\Order');
    }

}
