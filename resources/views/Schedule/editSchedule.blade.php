<?php
use Illuminate\Support\Facades;
use App\Http\Controllers;
?>

@extends('include.Master')

@section('title','Edit Schedule')

@section('body')
    <style>
        .row{
            padding: 1%;
        }
        .row> :first-child{
            text-align: right;
        }
    </style>

    <div style="margin-top: 10%;">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="text-align: center">Edit Schedule</h2>
            </div>
            <form method="post" action="{{action('ScheduleController@Update',$scheduleID)}}" style="margin: 0 15%">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="card-body">
                    <div class="row">
                        <div class="col">Schedule ID</div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="scheduleID" value="{{$schedule->scheduleID}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">Driver Name</div>
                        <div class="col-md-6">
                            <select class="form-control" name="staffID" id="staffID">
                                @foreach($staffs as $staff)
                                    <option value="{{$staff['id']}}" {{ $staff->ID == $schedule->driverID ? 'selected' : '' }}>{{$staff['staffFirstName'].' '.$staff['staffLastName']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">Driver Contact No</div>
                        <div class="col-md-6">
                            <select class="form-control" name="transportID" id="transportID">
                                @foreach($transports as $transport)
                                    <option value="{{$transport['transportID']}}" {{ $transport['transportID'] == $schedule['transportID'] ? 'selected' : '' }}>{{$transport['carPlate']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">Transport Plat No</div>
                        <div class="col-md-6">
                            <select class="form-control" name="regionID" id="regionID" required>
                                @foreach($results as $result)
                                    <option value="{{$result->regionID}}" {{ $result->regionID == $schedule->Region->regionID ? 'selected' : '' }}>{{$result->postcode.' '.$result->city.', '.$result->State}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">Delivery DateTime</div>
                        <div class="col-md-6">
                            <input class="form-control" type="datetime-local" name="dateTimeDelivery" value="{{date('Y-m-d\TH:i', strtotime($schedule->dateTimeDelivery))}}">
                        </div>
                    </div>
                </div>
                <p style="text-align: center">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a class="btn btn-default btn-danger" href="{{ url('schedules') }}">Cancel</a>
                </p>
            </form>
        </div>
    </div>
@endsection
