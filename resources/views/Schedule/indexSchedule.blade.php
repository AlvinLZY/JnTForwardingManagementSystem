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
        <div>
            <br>
            <h1>Schedule Dashboard</h1>
            <div style="text-align: right">
                <button class="btn btn-success" onclick="window.location='{{action('ScheduleController@Create')}}'">Add New Schedule</button>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Schedule ID</th>
                    <th>Driver Name</th>
                    <th>Transport Plat No</th>
                    <th>Date Created</th>
                    <th>Destination Region</th>
                    <th>Delivery DateTime</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{$schedule['scheduleID']}}</td>
                        <td>{{$schedule->staff->staffFirstName}}</td>
                        <td>{{$schedule->Transport->carPlate}}</td>
                        <td>{{$schedule['created_at']}}</td>
                        <td>{{$schedule->Region->city.', '.$schedule->Region->state}} </td>
                        <td>{{$schedule['dateTimeDelivery']}}</td>

                        <td>
                            <a href="{{action('ScheduleController@edit',$schedule['scheduleID'])}}" class="btn btn-warning">Edit</a>
                            <a href="{{action("ScheduleController@Show",$schedule['scheduleID'])}}" class="btn btn-info">Show</a>
                        </td>
                        <td>
{{--                             <form action="{{action('ProductController@destroy',$product['id'])}}" method="post">--}}
{{--                                 @csrf--}}
{{--                                 <input name="_method" type="hidden" value="DELETE">--}}
{{--                                 <button class="btn btn-danger" type="submit">Delete</button>--}}
{{--                             </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endsection
