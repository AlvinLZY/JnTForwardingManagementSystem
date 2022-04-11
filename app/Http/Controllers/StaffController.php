<!--author:Alvin Lim Zhi Yoong-->
<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\staff;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $staffs = staff::all();
            return view('Staff.indexStaff')->with('staffs', $staffs);
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
            return view('Staff\createStaff');
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
        try{
            $validatedData = $request->validate([
                'username' => 'required|max:50',
                'firstName' => 'required|max:30',
                'lastName' => 'required|max:30',
                'contactNo' => 'required|numeric',
                'email' => 'required|unique:customers,email,',
            ]);
            $staff = new staff();
            $staff ->username = $request ->get('username');
            $staff ->staffFirstName = $request ->get('firstName');
            $staff ->staffLastName = $request ->get('lastName');
            $staff ->contactNo = $request ->get('contactNo');
            $staff ->email = $request ->get('email');
            $staff->save();
            return redirect('Staff')->with('Success','Customer has been added');
        }
        catch (\Exception $ex){
            return redirect('Staff')->with('error',$ex->getMessage());
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
    public function edit($id)
    {
        if(Auth::check())
        {
            $staffs = staff::find($id);
            return view('Staff.editStaff',compact('staffs','id'));
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
        try {
            $staff = staff::find($id);
            $staff->staffFirstName = $request->get('firstName');
            $staff->staffLastName = $request->get('lastName');
            $staff->contactNo = $request->get('contactNo');
            $staff->email = $request->get('email');
            $staff->save();
            return redirect('Staff')->with('Success', 'Information has been updated');
        }
        catch(\Exception $ex){
            return redirect('Staff')->with('error',$ex->getMessage().'Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $staff = staff::find($id);
            $staff->delete();
            return redirect('Staff')->with('Success', 'Information has been deleted');
        }
        catch(\Exception $ex){
            return redirect('Staff')->with('error',$ex->getMessage());
        }
    }
}
