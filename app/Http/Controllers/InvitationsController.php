<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Invitation;
use Log;


class InvitationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurant_id) {
        $user = User::with('restaurants')->with('restaurants.users')->find(auth()->user()->id);
        return view('invite-user-to-restaurant')->with('restaurant_id', $restaurant_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurant_id) {
        $this->validate($request, [
            'user_name' => 'required'
        ]);

        $username = $request->input('user_name');
        $user = User::whereUsername($username)->first();
        if($user) {
            $invitation = Invitation::whereRestaurantId($restaurant_id)
                ->whereUserId($user['id'])
                ->first();
            if($invitation) {
                return redirect('restaurants')->with('message', 'Invite already sent');
            }
            $invitation = new Invitation();
            $invitation->restaurant_id = $restaurant_id;
            $invitation->user_id = $user['id'];
        }

        return redirect('restaurants')->with('success', 'Invite sent if user exists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
    public function destroy($id)
    {
        //
    }
}
