<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\OrderItem;

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
        $orderItem = OrderItem::whereId($id)->first();

        $orderItem->completed = $updatedOrderItem['completed'];
        $orderItem->in_progress = $updatedOrderItem['in_progress'];
        $orderItem->save();
        return response()->json([ 'success' => true ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) { }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {}
}
