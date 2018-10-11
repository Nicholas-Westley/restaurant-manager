<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderItem;
use App\Order;

class OrderItemsController extends Controller {

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $updatedOrderItem = $request->input('data');
        $orderItem = OrderItem::whereId($id)->with('order')->first();
        $orderItem->completed = $updatedOrderItem['completed'];
        $orderItem->in_progress = $updatedOrderItem['in_progress'];
        $orderItem->save();
        $orderItem->order->checkReady();
        return response()->json(Order::summaries());
    }
}
