<?php

namespace App\Http\Controllers;
use App\Setting;

class WebAppController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => []]);
    }

    public function show($restaurant_id) {
        $settings = Setting::whereUserId(auth()->user()->id)
            ->with('settingValue')
            ->with('settingOptions')
            ->get();

        return view('webapp',
            [
                'restaurant_id' => $restaurant_id,
                'settings' => $settings
            ]
        );
    }
}
