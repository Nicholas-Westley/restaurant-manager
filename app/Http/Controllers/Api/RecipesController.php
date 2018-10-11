<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;

class RecipesController extends Controller {


    public function index() {
        return Recipe::all();
    }

    public function show($id) {
        return Recipe::whereId($id)->with('ingredients')->first();
    }

}
