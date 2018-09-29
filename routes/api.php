<?php

use Illuminate\Http\Request;
use App\Recipe;

Route::group(['middleware'=>'api'], function() {
    //FETCH ALL RECIPES
    Route::get('recipes', function () {
        return Recipe::all();
    });
    // FETCH RECIPE BY ID
    Route::get('recipe/{recipeId}', function($recipeId) {
        return Recipe::whereId($recipeId)->with('ingredients')->first();
    });
    // ORDERS RESOURCE
    Route::resource('orders', 'OrdersController');
    // ODER ITEMS RESOURCE
    Route::resource('order-items', 'OrderItemsController');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
