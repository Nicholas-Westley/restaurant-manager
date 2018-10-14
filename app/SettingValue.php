<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingValue extends Model {
    protected  $fillable = [
        'user_id', 'setting_id', 'value'
    ];

    /* RELATIONSHIP */
    public function setting() {
        return $this->belongsTo('App\Setting');
    }
}
