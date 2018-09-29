<?php

Route::get('/', function () {
    return view('home');
});

Route::resource('restaurants', 'RestaurantsController');

Auth::routes();

