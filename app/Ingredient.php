<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model {
    public function fighter() {
        return $this->belongsTo('App\Recipe');
    }
}
