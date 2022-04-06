<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\staff;
use App\Models\Transport;
use App\Models\Region;
use DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $schedules = Schedule::where('isDelivered','=','0')->get();
//        foreach($schedules as $schedule){
//            echo $schedule->scheduleID.' '.$schedule->Transport->carPlate;
//            echo '<br>';
//        }
        return view('Schedule.viewSchedule',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $schedules = Schedule::all();
        $transports = Transport::all();
        return view('Schedule.createSchedule',compact('schedules','staffs','transports'));
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
            $region = Region::firstWhere('postcode',$request->get('postcode'));
            $schedule = new Schedule();
            $schedule->driverID = $_POST['staffID'];
            $schedule->transportID = $request->get('transportID');
            $schedule->destRegionID = $region->regionID;
            $schedule->dateTimeDelivery = $request->get('dateTimeDelivery');

            $schedule->save();
            return redirect('schedules')->with('success','Schedules has been added');
        }catch (\Exception $ex){
            return redirect('schedules')->with('error',$ex->getMessage());
        }
    }

    /**
     *
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
     * @param  int  $scheduleID
     * @return \Illuminate\Http\Response
     */
    public function edit($scheduleID)
    {
        $staffs = Staff::all();
        $schedules = Schedule::all();
        $transports = Transport::all();
        $schedule = Schedule::find($scheduleID);
        return view('Schedule.editSchedule',compact('schedule','scheduleID','staffs','schedules','transports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $scheduleID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $scheduleID = $request->get('scheduleID');
            $schedule = Schedule::find($scheduleID);
            $schedule->driverID = $request->get('staffID');
            $schedule->transportID = $request->get('transportID');
            $region = Region::where('postcode','=',$request->get('postcode'))->first();
            $schedule->destRegionID = $region['regionID'];
            $schedule->update();
            return redirect('schedules')->with('Success','Schedule  has been updated successfully.');
        }
        catch(\Exception $ex){
            return redirect('schedules')->with('error',$ex->getMessage());
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
        //
    }

}
