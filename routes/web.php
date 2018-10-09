<?php

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/webapp/{restaurant_id}', 'WebAppController@show');

Route::group(['prefix' => 'dashboard'], function(){
    Route::post('{restaurant_id}/invitations/{invitation_id}/accept', 'InvitationsController@accept');
    Route::resource('{restaurant_id}/invitations', 'InvitationsController');
    Route::resource('', 'DashboardController');
});


Route::resource('restaurants/{restaurant_id}/recipes', 'RecipesController');
Route::resource('restaurants', 'RestaurantsController');

Auth::routes();

