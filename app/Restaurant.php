<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model {
    /* RELATIONSHIP */
    public function users() {
        return $this->belongsToMany('App\User');
    }

    /* RELATIONSHIP */
    public function invitations() {
        return $this->belongsToMany('App\Invitation');
    }

    /* RELATIONSHIP */
    public function recipes() {
        return $this->hasMany('App\Recipe');
    }
}
