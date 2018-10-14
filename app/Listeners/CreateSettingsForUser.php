<?php

namespace App\Listeners;
use Illuminate\Auth\Events\Registered;
use App\Setting;
use App\SettingValue;
Use Log;

class CreateSettingsForUser {

    protected $defaultSettings = [
        'user_type' => 'Chef',
    ];

    /**
     * CREATE SETTINGS AFTER REGISTER
     * @return void
     */
    public function handle(Registered $registered) {
        $settings = Setting::all();
        foreach($settings as $setting) {
            $settingValue = new SettingValue();
            $settingValue['setting_id'] = $setting['id'];
            $settingValue['user_id'] = $registered->user->id;
            $settingValue['value'] = $this->defaultSettings[$setting['setting_key']];
            $settingValue->save();
        }
    }
}
