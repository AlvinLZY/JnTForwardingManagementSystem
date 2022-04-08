<?php
use Illuminate\Support\Facades;
use App\Http\Controllers\ScheduleController;
?>

@extends('include.Master')

@section('title','Schedule')

@section('body')
    @if (\Session::has('Success'))
        <div class="alert alert-success">
            <p>{{\Session::get('Success')}}</p>
        </div><br/>
    @elseif(\Session::has('error'))
        <div class="alert alert-danger">
            <p>{{\Session::get('error')}}</p>
        </div><br/>
    @endif
    <style>
        .col,.col-3{
            padding: 1%;
            font-size: larger;
        }

        .col-3{
            font-weight: bold;
        }
    </style>

    <div class="card-header">View Schedule</div>
    <div class="card">
        <div class="card-body">
            <br>
            <h2 class="card-title">Schedule ID: {{$schedule->scheduleID }}</h2>
            <div class="row">
                <div class="col-3">Driver Name</div>
                <div class="col">{{$schedule->staff->staffFirstName.' '.$schedule->staff->staffLastName}}</div>
            </div>
            <div class="row">
                <div class="col-3">Driver Contact No</div>
                <div class="col">{{$schedule->staff->contactNo}}</div>
            </div>
            <div class="row">
                <div class="col-3">Transport Plat No</div>
                <div class="col">{{$schedule->Transport->carPlate}}</div>
            </div>
            <div class="row">
                <div class="col-3">Transport Type</div>
                <div class="col">{{$schedule->Transport->carType}}</div>
            </div>
            <div class="row">
                <div class="col-3">Destination Region</div>
                <div class="col">{{$schedule->Region->postcode.' '.$schedule->Region->city.', '.$schedule->Region->state}}</div>
            </div>
        </div>
        <br>
        <h3>Orders Assignned</h3>
        @if($orders->count() > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Sender Name</th>
                <th>Receiver Name</th>
                <th>Total Weight</th>
                <th>Parcel Content</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order['orderID']}}</td>
                    <td>{{$order->sender->firstName.' '.$order->sender->lastName}}</td>
                    <td>{{$order->receiver->firstName.' '.$order->receiver->lastName}}</td>
                    <td>{{$order['totalWeight']}} kg</td>
                    <td>{{$order['parcelContentCategory']}}</td>

{{--Get CK de Order edit and show method--}}
                    <td>
                        <a href="{{action('ScheduleController@edit',$schedule['scheduleID'])}}" class="btn btn-warning">Edit</a>
                        <a href="{{action("ScheduleController@Show",$schedule['scheduleID'])}}" class="btn btn-info">Show</a>
                        <a href="{{action("ScheduleController@RemoveOrder",[$schedule['scheduleID'],$order['orderID']])}}" class="btn btn-danger">Remove</a>
                    </td>
                    <td>

{{--                        <form action="{{action('ScheduleController@RemoveOrder',order['orderID'])}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input name="_method" type="hidden" value="Remove">--}}
{{--                            <button class="btn btn-danger" type="submit">Remove</button>--}}
{{--                        </form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <br>
            <h4>There's No Orders Assignned to this Schedule</h4>
            <br>
        @endif
        <a href="{{ url('schedules') }}"><button class="btn btn-success">Back</button></a>
    </div>

@endsection
