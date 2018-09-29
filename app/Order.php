<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = ['accepted', 'ready', 'served'];

    /* RELATIONSHIP */
    public function orderItems() {
        return $this->hasMany('App\OrderItem');
    }

    public function checkReady() {
        $ready = self::all_items($this->orderItems->toArray(), 'completed');
        if($ready) {
            $this->ready = true;
            $this->save();
            return 'set ready';
        }
        return 'not ready yet';
    }

    private static function all_items($array, $key) {
        foreach ($array as $value) {
            if(!$value[$key]) return false;
        }
        return true;
    }

    // TODO this should not be a staic method
    public static function summaries() {
        return Order::with('orderItems')
            ->orderBy('id', 'DESC')
            ->with('orderItems.recipe')
            ->get();
    }
}
