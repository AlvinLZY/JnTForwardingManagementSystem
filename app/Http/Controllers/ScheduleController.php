<?php
//author:Alvin Lim Zhi Yoong
namespace App\Http\Controllers;

use App\Models\DeliveryOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\staff;
use App\Models\Transport;
use App\Models\Region;
use DB;
use mysql_xdevapi\Exception;
use Carbon;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::where('isDelivered','=','0')
            ->orderBy('dateTimeDelivery','ASC')
            ->get();
        return view('Schedule.indexSchedule',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sql = "SELECT DISTINCT(R.regionID), R.postcode, R.city, R.State FROM Delivery_orders as DO, Customers as C, Addresses as A, Regions as R WHERE DO.ReceiverID = C.ID AND C.ID = A.customerID AND A.RegionID = R.RegionID AND DO.scheduleID IS NULL ORDER BY R.RegionID";
        $results = DB::select($sql);

        $staffs = Staff::all();
        $schedules = Schedule::all();
        $transports = Transport::all();
        return view('Schedule.createSchedule',compact('schedules','staffs','transports','results'));
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
            $region = Region::find($request->get('regionID'));
            $schedule = new Schedule();
            $schedule->driverID = $_POST['staffID'];
            $schedule->transportID = $request->get('transportID');
            $schedule->destRegionID = $region->regionID;
            $schedule->dateTimeDelivery = $request->get('dateTimeDelivery');
            $schedule->save();
            $this->AssignOrderSchedule($region->regionID,null);
            return redirect('schedules')->with('Success','Schedules has been added');
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
    public function show($scheduleID)
    {
        $schedule = Schedule::find($scheduleID);
        $orders = DeliveryOrder::where('scheduleID','=',$scheduleID)->get();
        return view('Schedule.showSchedule',compact('schedule','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $scheduleID
     * @return \Illuminate\Http\Response
     */
    public function edit($scheduleID)
    {
        $sql = 'SELECT Distinct(R.regionID), R.postcode, R.city, R.State FROM Delivery_orders as DO, Customers as C, Addresses as A, Regions as R WHERE DO.ReceiverID = C.ID AND C.ID = A.customerID AND A.RegionID = R.RegionID AND (DO.scheduleID is NULL or DO.scheduleID ='.$scheduleID.')';
        $results = DB::select($sql);

        $staffs = Staff::all();
        $schedules = Schedule::all();
        $transports = Transport::all();
        $schedule = Schedule::find($scheduleID);
        return view('Schedule.editSchedule',compact('schedule','scheduleID','staffs','schedules','transports','results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $scheduleID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$scheduleID)
    {
        try{
            $schedule = Schedule::find($scheduleID);
            $schedule->driverID = $request->get('staffID');
            $schedule->transportID = $request->get('transportID');
            $region = Region::where('regionID','=',$request->get('regionID'))->first();
            $schedule->destRegionID = $region['regionID'];
            $this->UpdateOrderSchedule($scheduleID,$schedule->destRegionID);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $scheduleID)
    {
        try {
            $schedule = Schedule::find($scheduleID);
            $orders = DeliveryOrder::where('scheduleID', '=', $scheduleID)->get();

            if ($orders->count() > 0 || $schedule->count() > 0) {
                foreach ($orders as $order) {
                    DB::statement('UPDATE delivery_orders set scheduleID = null WHERE scheduleID = ' . $scheduleID . ' AND orderID = ' . $order['orderID']);
                }
                $schedule->delete();
                return redirect()->back()->with('Success', 'Schedule [' . $scheduleID . '] is deleted.');
            } else {
                return redirect()->back()->with('error', 'Schedule [' . $scheduleID . '] is not found. Please refresh and try again.');
            }
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    /**
     * Remove Order from the schedule
     *
     * @param int $scheduleID
     * @return \Illuminate\Http\Response
     */
    public function RemoveOrder($scheduleID, $orderID){
        try{
            $schedule = Schedule::find($scheduleID);
            $orders = DeliveryOrder::where('scheduleID','=',$scheduleID)->get();

            $targetedOrder = DeliveryOrder::where('orderID','=',$orderID)->get();
            if($targetedOrder->count()> 0){
                DB::statement('UPDATE delivery_orders set scheduleID = null WHERE scheduleID = '.$scheduleID.' AND orderID = ' . $orderID);
                $orders = DeliveryOrder::where('scheduleID','=',$scheduleID)->get();
                if($orders->count() <= 0){
                    DB::statement('DELETE FROM schedules WHERE scheduleID = '.$scheduleID);
                    return redirect("schedules")->with('Success','Schedule ['.$scheduleID.'] has been removed as there\'s no order left assigning to it');
                }
                return redirect()->back()->with('Success','Order ['.$orderID.'] has been removed from schedule ['.$scheduleID.'] successfully.');
            }
            else{
                return redirect()->back()->with('error','Order ['.$orderID.'] is not found. Please refresh and try again.');
            }
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    /**
     * Update Order inSchedule Status
     *
     * @param int $regionID
     * @param int $scheduleID
     */
    public function AssignOrderSchedule($regionID, $scheduleID){
        try {
            if($scheduleID == null){
                $schedule = Schedule::orderby('created_at', 'desc')->first();
                $scheduleID = $schedule->scheduleID;
            }
            $sql = 'SELECT DO.orderID, DO.receiverID FROM Delivery_orders as DO, Customers as C, Addresses as A, Regions as R WHERE DO.ReceiverID = C.ID AND C.ID = A.CustomerID AND A.RegionID = R.RegionID AND DO.scheduleID IS NULL AND R.regionID = ' . $regionID.' LIMIT 10';
            $orders = DB::select($sql);
            if (!empty($orders)) {
                foreach ($orders as $order) {
                    DB::statement('UPDATE delivery_orders set scheduleID = ' . $scheduleID . ' WHERE scheduleID is NULL AND orderID = ' . $order->orderID);
                }
            }
        }
        catch(\Exception $ex){
            return redirect('schedules')->with('error',$ex->getMessage());
        }
    }

    /**
     * Update Order from the schedule
     *
     * @param int $scheduleID
     * @param int $regionID
     * @return \Illuminate\Http\Response
     */
    public function UpdateOrderSchedule($scheduleID, $regionID){
        try{
             $deliveryOrders = DeliveryOrder::where('scheduleID','=',$scheduleID)->GET();
             if($deliveryOrders->count()>0){
                 foreach ($deliveryOrders as $deliveryOrder){
                     if($deliveryOrder->Schedule->Region->regionID != $regionID){
                         DB::statement('UPDATE delivery_orders set scheduleID = NULL WHERE orderID = '.$deliveryOrder->orderID);
                     }
                 }
                 $this->AssignOrderSchedule($regionID,$scheduleID);
             }
        }
        catch(\Exception $ex){
            return redirect('schedules')->with('error',$ex->getMessage());
        }
    }
}
