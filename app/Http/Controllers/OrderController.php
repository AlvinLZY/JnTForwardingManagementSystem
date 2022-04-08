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
        //$data = Schedule::select('scheduleID')->get();
        //return $data;
        return view ('order.index')->with('delivery_orders', $delivery_orders);
    }

    public function readXml()
    {
        $xmlDataString = file_get_contents(public_path('xml/parcelContent.xml'));
        $xmlObject = simplexml_load_string($xmlDataString);
                   
        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true); 
        return view('order.content',compact('json','phpDataArray'));
    }
    //testing here

    public function create()
    {
        $customers = Customer::all();
        $delivery_orders = DeliveryOrder::all();
        return view('order.create',compact('customers','delivery_orders'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        DeliveryOrder::create($input);
        return redirect('order')->with('flash_message', 'Order Addedd!'); 
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
        $delivery_orders = DeliveryOrder::find($orderID);
        $delivery_orders->senderID=$request->get('senderID');
        $delivery_orders->receiverID=$request->get('receiverID');
        $delivery_orders->totalWeight=$request->get('totalWeight');
        $delivery_orders->parcelContentCategory=$request->get('parcelContentCategory1'); 

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
