<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\SettingValue;
use Log;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => []]);
    }

    public function index() {
        return Setting::whereUserId(auth()->user()->id)
            ->with('settingValue')
            ->with('settingOptions')
            ->get();
    }

    public function update(Request $request, $setting_value_id) {
        $updatedSetting = $request->input('data');
        $settingValue = SettingValue::find($setting_value_id);
        if($settingValue) {
            $settingValue->value = $updatedSetting['value'];
            $settingValue->save();
        }
    }
}
