<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view ('Customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customer\createCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'contactNo' => 'required|numeric',
            'email' => 'required|unique:customers,email,',
            'address' => 'required',
        ]);
        
        $customer = new Customer();
        $customer ->firstName = $request ->get('firstName');
        $customer ->lastName = $request ->get('lastName');
        $customer ->contactNo = $request ->get('contactNo');
        $customer ->email = $request ->get('email');
        $customer ->address = $request ->get('address');
        $customer ->save();
        return redirect('customer')->with('success','Customer has been added');
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
        $customers = Customer::find($id);
        return view('Customer/edit',compact('customers','id'));
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
        $customer = Customer::find($id);
        $customer ->firstName = $request ->get('firstName');
        $customer ->lastName = $request ->get('lastName');
        $customer ->contactNo = $request ->get('contactNo');
        $customer ->email = $request ->get('email');
        $customer ->address = $request ->get('address');
        $customer ->save();
        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('customer')->with('success','Information has been deleted');
    }
}
