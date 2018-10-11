<?php

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/webapp/{restaurant_id}', 'WebAppController@show');

Route::group(['prefix' => 'dashboard'], function(){
    Route::post('{restaurant_id}/invitations/{invitation_id}/accept', 'InvitationsController@accept');
    Route::resource('{restaurant_id}/invitations', 'InvitationsController')
        ->only(['create', 'store', 'destroy']);
    Route::get('', 'DashboardController@index');
});


Route::resource('restaurants/{restaurant_id}/recipes', 'RecipesController')
    ->only(['show', 'create', 'store', 'update', 'destroy']);
Route::resource('restaurants', 'RestaurantsController')
    ->only(['show', 'create', 'store', 'destroy']);

Auth::routes();

