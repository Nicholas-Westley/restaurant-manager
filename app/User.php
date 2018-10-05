<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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

}
