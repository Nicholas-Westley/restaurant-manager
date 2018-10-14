<?php

namespace App\Http\Controllers;
use App\Setting;
use App\SettingValue;
use Log;

class WebAppController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => []]);
    }

    public function show($restaurant_id) {
        $settings = SettingValue::whereUserId(auth()->id())
            ->with('setting')
//            ->with('setting.settingOptions')
            ->get();

        Log::debug($settings);

        return view('webapp',
            [
                'restaurant_id' => $restaurant_id,
                'settings' => $settings
            ]
        );
    }
}
