<?php
use Illuminate\Support\Facades;
use App\Http\Controllers\ScheduleController;
?>

@extends('include.Master')

@section('title','Create Schedule')

@section('body')
    <div style="margin-top: 15%;text-align: center">
        <h2>Add New Schedule</h2><br>
        <form method="post" action="{{url('schedules')}}">
            @csrf

                <label for="name">Driver Name:</label>
                <select name="staffID" id="staffID">
                    @foreach($staffs as $staff)
                        <option value="{{$staff['staffID']}}">{{$staff['staffFirstName'].' '.$staff['staffLastName']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="code">Transport Plat No:</label>
                <select name="transportID" id="transportID">
                    @foreach($transports as $transport)
                        <option value="{{$transport['transportID']}}">{{$transport['carPlate']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="name">Destination Region:</label>
                <input type="text" name="postcode">
                <select name="postcode" id="postcode">
                    @foreach($transports as $transport)
                        <option value="{{$transport['transportID']}}">{{$transport['carPlate']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="code">Delivery DateTime:</label>
                <input type="datetime-local" name="dateTimeDelivery" value="{{date('Y-m-d\TH:i', strtotime(Carbon\Carbon::now()))}}">
            </p>
            <p>
                <button class="btn btn-success" type="submit">Submit</button>
            </p>
        </form>
    </div>
@endsection
