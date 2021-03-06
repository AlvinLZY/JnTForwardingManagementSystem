<?php
//author:Sing Wei Hern
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Region;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
        $data = Customer::join('addresses','customers.id','=','addresses.customerID')
                ->join('regions','addresses.regionID','=','regions.regionID')
                ->get(['customers.id','customers.lastName','customers.firstName','customers.contactNo','customers.email','addresses.address','regions.postcode','regions.city','regions.state']);
        
        return view ('Customer.index',compact('data'));
        }
        else
            return view('Auth/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
        {
        $regions = Region::all();
        return view('Customer\createCustomer',compact('regions'));
        }
        else
            return view('Auth/login');        
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
            'contactNo' => 'required|numeric|regex:/^(01)[0-9]{8,9}$/',
            'email' => 'required|unique:customers,email|email',
        ]);        
        
        $customer = new Customer();
      
        $customer ->firstName = $request ->get('firstName');
        $customer ->lastName = $request ->get('lastName');
        $customer ->contactNo = $request ->get('contactNo');
        $customer ->email = $request ->get('email');
        
        $customer ->save();
        
        $address = new Address();
                
        $address ->regionID = (int)$request ->get('region');
        $address ->address = $request ->get('address');
        $address ->customerID = $customer ->id;
        
        $address ->save();
        
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
        if(Auth::check())
        {
            $customers = Customer::find($id);
            $regions = Region::all();

            $data = Customer::join('addresses','customers.id','=','addresses.customerID')
                    ->join('regions','addresses.regionID','=','regions.regionID')
                    ->where('customers.id',$id)
                    ->get(['customers.id','customers.lastName','customers.firstName','customers.contactNo','customers.email','addresses.address','addresses.addressID','regions.regionID']);

            return view('Customer/edit',compact('customers','id','regions','data'));
        }
        else
            return view('Auth/login');
        
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
        $validatedData = $request->validate([
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'contactNo' => 'required|numeric|regex:/^(01)[0-9]{8,9}$/',
            'email' => 'required|unique:customers,email|email',
        ]);  
        $customer = Customer::find($id);
      
        $customer ->firstName = $request ->get('firstName');
        $customer ->lastName = $request ->get('lastName');
        $customer ->contactNo = $request ->get('contactNo');
        $customer ->email = $request ->get('email');
        
        $customer ->save();
        
        $address = Address::find($request ->get('addressID'));
                
        $address ->regionID = $request ->get('region');
        $address ->address = $request ->get('address');
        $address ->customerID = $customer ->id;
        
        $address ->save();
        
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
