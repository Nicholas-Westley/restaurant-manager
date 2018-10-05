<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model {
    /* RELATIONSHIP */
    public function user() {
        return $this->belongsTo('App\User', 'inviter_id');
    }
    /* RELATIONSHIP */
    public function restaurant() {
        return $this->belongsTo('App\Restaurant');
    }
}
