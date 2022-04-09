<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Models\Customer;


class OrderController extends Controller
{
    public function index()
    {
        $delivery_orders = DeliveryOrder::all();
        return view ('order.index')->with('delivery_orders', $delivery_orders);
    }


    public function create()
    {
        
        $customers = Customer::all();
        $delivery_orders = DeliveryOrder::all();
        return view('order.create',compact('customers','delivery_orders'));
    }

    public function store(Request $request)
    { 
        try{
        $input = $request->all();
        DeliveryOrder::create($input);
        // Alert::success('Congrats', 'You\'ve Successfully Registered');
        return redirect('order')->with('Success', 'Order Added!'); 
        }catch(\Exception $ex){
            return redirect('order')->with('error',$ex->getMessage());
        }
    }

    public function show($orderID)
    {
        $customers = Customer::all();
        $delivery_orders = DeliveryOrder::find($orderID);
        $senderID = Customer::firstWhere('customerID',$delivery_orders['senderID']);
        $receiverID = Customer::firstWhere('customerID',$delivery_orders['receiverID']);
        return view('order.show',compact('customers','delivery_orders','senderID','receiverID'));
    }

    public function edit($orderID)
    {
        $customers = Customer::all();
        $delivery_orders = DeliveryOrder::find($orderID);
        return view('order.edit',compact('delivery_orders', 'delivery_orders','customers'));
    }

    public function update(Request $request, $orderID)
    {
        try{
            $delivery_orders = DeliveryOrder::find($orderID);
            $delivery_orders->senderID=$request->get('senderID');
            $delivery_orders->receiverID=$request->get('receiverID');
            $delivery_orders->totalWeight=$request->get('totalWeight');
            $delivery_orders->parcelContentCategory=$request->get('parcelContentCategory');
            $delivery_orders->scheduleID=$request->get('scheduleID');
            $delivery_orders->update();
            return redirect('order')->with('Success', 'Order Updated!');
        }
        catch(\Exception $ex){
            return redirect('order')->with('error','Update Fail!!' . $ex->getMessage());
        }
    }

    public function destroy($orderID)
    {
        DeliveryOrder::destroy($orderID);
        return redirect('order')->with('Success', 'Order deleted!');
    }
}
