<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use App\OrderItemIngredientMap;
use App\Order;
use App\OrderItem;
use Log;
use Pusher;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json(Order::summaries());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $order = Order
            ::whereId($id)
            ->with('orderItems')
            ->with('orderItems.orderItemIngredientMaps')
            ->with('orderItems.recipe')
            ->with('orderItems.recipe.ingredients')
            ->first();
        return response()->json($order);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Response $response) {
        $order = new Order();
        $order->accepted = false;
        $order->ready = false;
        $order->served = false;
        $order->save();
        $items = $request->input('items');
        foreach($items as $item) {
            $orderItem = new OrderItem();
            $orderItem->recipe_id = $item['id'];
            $orderItem->order_id = $order->id;
            $orderItem->completed = false;
            $orderItem->in_progress = false;
            $orderItem->save();
            foreach($item['ingredients'] as $key => $ingredient) {
                if(($ingredient['selected'])) {
                    $map = new OrderItemIngredientMap();
                    $map->ingredient_id = $key;
                    $map->order_item_id = $orderItem->id;
                    $map->save();
                }
            }
        }

        $pusherConfig = Config::get('pusher', []);
        $pusher = new Pusher\Pusher(
            $pusherConfig['key'],
            $pusherConfig['secret'],
            $pusherConfig['app_id'],
            [
                'cluster' => $pusherConfig['cluster'],
                'useTLS' => true
            ]
        );
        $data = ['type'=>'order_created'];
        $pusher->trigger(
            $pusherConfig['channel'],
            $pusherConfig['events']['order_received'],
            $data
        );
        return ['order' => $order];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $updatedOrder = $request->input('data');
        $order = Order::whereId($id)->first();
        $order->accepted = $updatedOrder['accepted'];
        $order->ready = $updatedOrder['ready'];
        $order->served = $updatedOrder['served'];
        $order->save();
        return $this->index();
    }

    /* Remove the specified resource from storage. */
    public function destroy($id) {
        $order = Order
            ::whereId($id)
            ->with('orderItems')
            ->with('orderItems.orderItemIngredientMaps')
            ->first();
        foreach($order->orderItems as $item) {
            foreach($item->orderItemIngredientMaps as $map) {
                $map->delete();
            }
            $item->delete();
        }
        $order->delete();
        return $this->index();
    }

}
