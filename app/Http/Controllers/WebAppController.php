<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebAppController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => []]);
    }

    public function show($restaurant_id) {
        return view('webapp')
            ->with('restaurant_id', $restaurant_id);
    }
}
