<?php

/* LANDING */
Route::get('/', 'LandingController@index');

/* WEB APP*/
Route::get('/webapp/{restaurant_id}', 'WebAppController@show');

/* DASHBOARD */
Route::get('dashboard', 'DashboardController@index');

/* RECIPES */
Route::resource('restaurants/{restaurant_id}/recipes', 'RecipesController')
    ->only(['show', 'create', 'store', 'update', 'destroy']);

/* RESTAURANTS */
Route::resource('restaurants', 'RestaurantsController')
    ->only(['show', 'create', 'store', 'destroy']);

/* INVITATIONS */
Route::post('restaurants/{restaurant_id}/invitations/{invitation_id}/accept', 'InvitationsController@accept');
Route::resource('restaurants/{restaurant_id}/invitations', 'InvitationsController')
    ->only(['create', 'store', 'destroy']);

/* INGREDIENTS */
Route::resource('restaurants/{restaurant_id}/recipes/{recipe_id}/ingredients',
    'IngredientsController')
    ->only(['create', 'store', 'destroy', 'edit', 'update']);

/* SETTINGS */
Route::resource('settings', 'SettingsController')
    ->only(['index']);

/* AUTH */
Auth::routes();

