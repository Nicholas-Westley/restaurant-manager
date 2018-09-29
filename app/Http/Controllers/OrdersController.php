<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\OrderItemIngredientMap;
use App\Order;
use App\OrderItem;

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
            $recipe = $item['recipe'];
            $orderItem = new OrderItem();
            $orderItem->recipe_id = $recipe['id'];
            $orderItem->order_id = $order->id;
            $orderItem->completed = false;
            $orderItem->in_progress = false;
            $orderItem->save();
            $ingredientIds = $item['ingredientIds'];
            foreach($ingredientIds as $id => $value) {
                if(!empty($value)) {
                    $map = new OrderItemIngredientMap();
                    $map->ingredient_id = $id;
                    $map->order_item_id = $orderItem->id;
                    $map->save();
                }
            }
        }
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

    /* Show the form for editing the specified resource. */
    public function edit($id) { }
    /* Show the form for creating a new resource. */
    public function create(){ }

}
