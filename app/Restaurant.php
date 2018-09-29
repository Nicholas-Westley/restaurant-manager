<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model {
    /* RELATIONSHIP */
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
