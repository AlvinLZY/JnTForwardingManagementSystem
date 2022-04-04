<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;

class OrderController extends Controller
{
    public function index()
    {
        $delivery_orders = DeliveryOrder::all();
        return view ('order.index')->with('delivery_orders', $delivery_orders);
    }

    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        DeliveryOrder::create($input);
        return redirect('order')->with('flash_message', 'Order Addedd!'); 
    }

    public function show($orderID)
    {
        $delivery_orders = DeliveryOrder::find($orderID);
        return view('order.show')->with('delivery_orders', $delivery_orders);
    }

    public function edit($orderID)
    {
        $delivery_orders = DeliveryOrder::find($orderID);
        return view('order.edit',compact('delivery_orders', 'delivery_orders'));
    }

    public function update(Request $request, $orderID)
    {
        $delivery_orders = DeliveryOrder::find($orderID);
        
        $delivery_orders->senderID=$request->get('senderID');
        $delivery_orders->receiverID=$request->get('receiverID');
        $delivery_orders->totalWeight=$request->get('totalWeight');
        $delivery_orders->parcelContentCategory=$request->get('parcelContentCategory');
        $delivery_orders->scheduleID=$request->get('scheduleID');
        $delivery_orders->update();
        return redirect('order/')->with('flash_message', 'Order Updated!');  
    }

    public function destroy($orderID)
    {
        DeliveryOrder::destroy($orderID);
        return redirect('order')->with('flash_message', 'Order deleted!');
    }
}
