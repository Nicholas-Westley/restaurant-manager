<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Log;


class DashboardController extends Controller {

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
        return view('dashboard')->with('user', $user);
    }
}
