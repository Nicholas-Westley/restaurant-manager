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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = User::with('restaurants')
            ->with('restaurants.users')
            ->with('invitations')
            ->with('invitations.restaurant')
            ->find(auth()->user()->id);
        return view('restaurants')->with('user', $user);
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
        return redirect('/restaurants')->with('$restaurants', $user->restaurants);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $restaurant = Restaurant::find($id);
        if($restaurant) {
            $restaurant->delete();
        }
        return $this->index();
    }
}
