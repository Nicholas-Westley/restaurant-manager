<?php
/* WEB APP*/
Route::get('/webapp/{restaurant_id}', 'WebAppController@show');
/* DASHBOARD */
Route::get('/', 'DashboardController@index');
Route::group(['prefix' => 'dashboard'], function(){
    Route::post('{restaurant_id}/invitations/{invitation_id}/accept', 'InvitationsController@accept');
    Route::resource('{restaurant_id}/invitations', 'InvitationsController')
        ->only(['create', 'store', 'destroy']);
    Route::get('', 'DashboardController@index');
});
/* RECIPES */
Route::resource('restaurants/{restaurant_id}/recipes', 'RecipesController')
    ->only(['show', 'create', 'store', 'update', 'destroy']);
/* RESTAURANTS */
Route::resource('restaurants', 'RestaurantsController')
    ->only(['show', 'create', 'store', 'destroy']);
/* INGREDIENTS */
Route::resource('restaurants/{restaurant_id}/recipes/{recipe_id}/ingredients',
    'IngredientsController')
    ->only(['create', 'store', 'destroy', 'edit', 'update']);
/* SETTINGS */
Route::resource('settings', 'SettingsController')
    ->only(['index']);
/* ROUTES */
Auth::routes();

