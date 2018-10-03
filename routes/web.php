<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/webapp', 'WebAppController@show');

Route::group(['prefix' => 'restaurants'], function(){
    Route::resource('{restaurant_id}/invitations', 'InvitationsController');
    Route::resource('', 'RestaurantsController');
});

Auth::routes();

