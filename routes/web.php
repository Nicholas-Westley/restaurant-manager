<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/webapp', 'WebAppController@show');

Route::resource('restaurants', 'RestaurantsController');

Auth::routes();

