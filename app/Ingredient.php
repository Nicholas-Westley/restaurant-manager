<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model {

    protected $fillable = ['name', 'recipe_id', 'optional', 'selected_by_default'];

    public function fighter() {
        return $this->belongsTo('App\Recipe');
    }
}
