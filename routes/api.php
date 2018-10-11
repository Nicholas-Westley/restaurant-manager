<?php

use Illuminate\Http\Request;
use App\Recipe;

Route::group(['middleware'=>'api'], function() {
    // ORDERS RESOURCE
    Route::resource('orders', 'Api\OrdersController')
        ->only(['index', 'show', 'store', 'update', 'destroy']);
    // ORDER-ITEMS RESOURCE
    Route::resource('order-items', 'Api\OrderItemsController')
        ->only(['update']);
    Route::resource('restaurants/{restaurant_id}/recipes', 'Api\RecipesController')
        ->only(['index', 'show']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
