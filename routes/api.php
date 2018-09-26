<?php

use Illuminate\Http\Request;
use App\Recipe;

Route::group(['middleware'=>'api'], function() {
    //FETCH ALL RECIPES
    Route::get('recipes', function () {
        return Recipe::all();
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
