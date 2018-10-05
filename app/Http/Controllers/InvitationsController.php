<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use App\User;
use App\Invitation;
use Log;


class InvitationsController extends Controller {

    public function create($restaurant_id) {
        return view('invite-user-to-restaurant')
            ->with('restaurant_id', $restaurant_id);
    }

    public function store(Request $request, $restaurant_id) {
        $this->validate($request, [
            'user_name' => 'required'
        ]);
        $username = $request->input('user_name');
        $invitee = User::whereUsername($username)->first();
        if($invitee) {
            $invitation = Invitation::whereRestaurantId($restaurant_id)
                ->whereInviteeId($invitee['id'])
                ->first();
            if($invitation) {
                return redirect('restaurants')->with('message', 'Invite already sent');
            }
            $invitation = new Invitation();
            $invitation->restaurant_id = $restaurant_id;
            $invitation->invitee_id = $invitee['id'];
            $invitation->inviter_id = auth()->user()->id;
            $invitation->accepted = false;
            $invitation->save();
        }
        return redirect('restaurants')
            ->with('success', 'Invite sent if user exists');
    }

    public function accept($restaurant_id, $invitation_id) {
        $invitation = Invitation::find($invitation_id);
        if($invitation) {
            $invitation->accepted = true;
            $invitation->save();

            $alreadyMember = Restaurant::find($restaurant_id)
                ->with('users')
                ->whereHas('users', function($q) {
                    $q->where('users.id', '=', auth()->user()->id);
                })
                ->first();
            if ($alreadyMember) {
                return redirect('restaurants')->with('message', 'You are already a member of this restaurant');
            }
            $restaurant = Restaurant::find($restaurant_id);
            $restaurant->users()->attach(auth()->user());
            return redirect('restaurants')->with('message', 'Added to Restaurant');
        }
        return redirect('restaurants');
    }

    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}

    public function destroy($id) {
        $invitation = Invitation::whereId($id);
        if($invitation) {
            $invitation->delete();
        }
        return redirect('restaurants');
    }
}
