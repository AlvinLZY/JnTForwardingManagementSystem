<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;

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
	return view('Payment/paymentIndex', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Payment/paymentCreate');
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
	return redirect('payments')->with('success', 'Information Has been added');
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
    public function show($id)
    {
        //
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
	return redirect('payments')->with('success', 'Information has been deleted');
    }
}
