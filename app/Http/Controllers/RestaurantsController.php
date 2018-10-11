<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;
use Log;

class RestaurantsController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => []]);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        $restaurant = Restaurant::whereId($id)
            ->with('recipes')
            ->with('recipes.ingredients')
            ->first();
        return view('restaurant')
            ->with('restaurant', $restaurant);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('create-restaurant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $restaurant = new Restaurant();
        $restaurant->name = $request->input('restaurant_name');
        $restaurant->owner_id = auth()->user()->id;
        $restaurant->save();
        $user = User::find(auth()->user()->id);
        $restaurant->users()->attach($user);
        return redirect('/dashboard')->with('$restaurants', $user->restaurants);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurant_id) {
        $restaurant = Restaurant::whereId($restaurant_id);
        if($restaurant) {
            $restaurant->delete();
        }
        return redirect("dashboard");
    }
}
