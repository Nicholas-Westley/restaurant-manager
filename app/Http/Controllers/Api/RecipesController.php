<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Log;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\User;

class RecipesController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => []]);
    }

    public function index($restaurant_id) {
        return Recipe::whereRestaurantId($restaurant_id)
            ->whereEnabled(true)
            ->get();
    }

    public function show($restaurant_id, $recipe_id) {
        return Recipe::whereId($recipe_id)
            ->with('ingredients')->first();
    }

}
