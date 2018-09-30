<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/webapp', function() {
   return view('webapp');
});

Route::resource('restaurants', 'RestaurantsController');

Auth::routes();

