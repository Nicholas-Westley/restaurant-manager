<?php

use Illuminate\Http\Request;

Route::group(['middleware'=>'api'], function() {
    /* ORDERS RESOURCE */
    Route::resource('orders', 'Api\OrdersController')
        ->only(['index', 'show', 'store', 'update', 'destroy']);
    /* ORDER-ITEMS RESOURCE */
    Route::resource('order-items', 'Api\OrderItemsController')
        ->only(['update']);
    /* RECIPES RESOURCE */
    Route::resource('restaurants/{restaurant_id}/recipes', 'Api\RecipesController')
        ->only(['index', 'show']);
    /* API LOGIN */
    Route::post('login', 'Api\Auth\AuthController@login');
});
/* SETTINGS */
Route::resource('settings', 'Api\SettingsController')
    ->only(['index', 'update']);
/* AUTH */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
