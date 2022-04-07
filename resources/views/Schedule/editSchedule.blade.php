<?php
use Illuminate\Support\Facades;
use App\Http\Controllers;
?>

@extends('include.Master')

@section('title','Edit Schedule')

@section('body')
    <div style="margin-top: 15%;text-align: center">
        <h2>Edit Schedule</h2><br>
        <form method="post" action="{{action('ScheduleController@Update',$scheduleID)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <p>
                <label for="scheduleID">Schedule ID:</label>
                <input type="text" name="scheduleID" value="{{$schedule->scheduleID}}" readonly>
            </p>
            <p>
                <label for="driverID">Driver Name:</label>
                <select name="staffID" id="staffID">
                    @foreach($staffs as $staff)
                        <option value="{{$staff['staffID']}}" {{ $staff->staffID == $schedule->driverID ? 'selected' : '' }}>{{$staff['staffFirstName'].' '.$staff['staffLastName']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="transportID">Transport Plat No:</label>
                <select name="transportID" id="transportID">
                    @foreach($transports as $transport)
                        <option value="{{$transport['transportID']}}" {{ $transport['transportID'] == $schedule['transportID'] ? 'selected' : '' }}>{{$transport['carPlate']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="regionID">Destination Region:</label>
                <input type="text" name="postcode" value="{{$schedule->Region->postcode}}">
            </p>
            <p>
                <label for="dateTimeDelivery">Delivery DateTime:</label>
                <input type="datetime-local" name="dateTimeDelivery" value="{{date('Y-m-d\TH:i', strtotime($schedule->dateTimeDelivery))}}">
            </p>
            <p>
                <button class="btn btn-primary" type="submit">Update</button>
            </p>
        </form>
    </div>
@endsection
