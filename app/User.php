<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $fillable = [ 'name', 'email', 'password', 'username'];
    protected $hidden = ['password', 'remember_token'];

    /* RELATIONSHIP */
    public function restaurants() {
        return $this->belongsToMany('App\Restaurant');
    }

    /* RELATIONSHIP */
    public function invitations() {
        return $this->hasMany('App\Invitation', 'invitee_id');
    }

    /* RELATIONSHIP */
    public function settings() {
        return $this->hasMany('App\Setting');
    }

    /* JWT STUFF */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /* JWT STUFF */
    public function getJWTCustomClaims() {
        return [];
    }

}
