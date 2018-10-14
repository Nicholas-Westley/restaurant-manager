<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    /* RELATIONSHIP */
    public function settingOptions() {
        return $this->hasMany('App\SettingOption');
    }

    /* RELATIONSHIP */
    public function settingValue() {
        return $this->hasOne('App\SettingValue');
    }
}
