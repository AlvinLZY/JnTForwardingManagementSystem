<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;

use App\Models\DeliveryOrder;

use XMLWriter;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::all();
        
        $xml = new XMLWriter();
        $xml->openURI('xml/transaction.xml');
        $xml->setIndent(true);
        $xml->setIndentString('    ');
        $xml->startDocument('1.0', 'UTF-8');
            $xml->startElement('xml');
                    foreach($payments as $payment){
                        $xml->startElement('Payment');
                            $xml->writeElement('paymentID', $payment->paymentID);
                            $xml->writeElement('deliveryOrderID', $payment->deliveryOrderID);
                            $xml->writeElement('totalAmount', $payment->totalAmount);
                            $xml->writeElement('paymentType', $payment->paymentType);
                            $xml->writeElement('status', $payment->status);
                            $xml->writeElement('created_at', $payment->created_at);
                            $xml->writeElement('updated_at', $payment->updated_at);
                        $xml->endElement();
                    }
            $xml->endElement();
        $xml->endDocument();
        $xml->flush();
        unset($xml);
        
	return view('Payment/paymentIndex', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('Payment/paymentCreate');
        $orders = DeliveryOrder::all();
        return view('Payment/paymentCreate',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $payment = new Payment();
            $payment->paymentID = $request->get('paymentID');
            $payment->deliveryOrderID = $request->get('deliveryOrderID');
            $payment->totalAmount = $request->get('totalAmount');
            $payment->paymentType = $request->get('paymentType');
            $payment->status = $request->get('status');
            $payment->save();
	return redirect('payments')->with('success', 'Payment is successfully added.');
        }
        catch (Exception $e){
            echo 'Message: ' .$e->getMessage();
            return redirect('payments')->with('error', $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($paymentID)
    {
        $payment = Payment::find($paymentID);
        return view('Payment/paymentDetails')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($paymentID)
    {
        $payment = Payment::find($paymentID);
	return view('Payment/paymentEdit', compact('payment', 'paymentID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paymentID)
    {
        try{
            $payment= Payment::find($paymentID);
            $payment->paymentID = $request->get('paymentID');
            $payment->deliveryOrderID = $request->get('deliveryOrderID');
            $payment->totalAmount = $request->get('totalAmount');
            $payment->paymentType = $request->get('paymentType');
            $payment->status = $request->get('status');
            $payment->save();
	return redirect('payments');
        }
        catch (Exception $e){
            echo 'Message: ' .$e->getMessage();
            return redirect('payments')->with('error', $e->getMessage());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($paymentID)
    {
        $payment= Payment::find($paymentID);
	$payment->delete();
	return redirect('payments')->with('success', 'Payment has been deleted');
    }
}
