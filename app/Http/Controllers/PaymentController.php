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
	return view('paymentIndex', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment();
	$payment->paymentID = $request->get('paymentID');
	$payment->deliveryOrderID = $request->get('deliveryOrderID');
        $payment->totalAmount = $request->get('totalAmount');
        $payment->paymentType = $request->get('paymentType');
        $payment->status = $request->get('status');
	$payment->save();
	return redirect('payments')->with('success', 'Information Has been added');
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
    public function edit($id)
    {
        $payment = Payment::find($id);
	return view('paymentEdit', compact('payment', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment= Payment::find($id);
	$payment->paymentID = $request->get('paymentID');
	$payment->deliveryOrderID = $request->get('deliveryOrderID');
        $payment->totalAmount = $request->get('totalAmount');
        $payment->paymentType = $request->get('paymentType');
        $payment->status = $request->get('status');
	$payment->save();
	return redirect('payments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment= Payment::find($id);
	$payment->delete();
	return redirect('payments')->with('success', 'Information has been deleted');
    }
}
