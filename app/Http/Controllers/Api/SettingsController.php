<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Log;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {
        return Setting::whereUserId(auth()->user()->id)
            ->with('settingOptions')
            ->get();
    }

    public function update(Request $request, $setting_id) {
        $updatedSetting = $request->input('data');
        $setting = Setting::find($setting_id);
        if($setting) {
            $setting->setting_value = $updatedSetting['value'];
            $setting->save();
        }
    }
}
