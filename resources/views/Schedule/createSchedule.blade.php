<?php
use Illuminate\Support\Facades;
use App\Http\Controllers\ScheduleController;
?>

@extends('include.Master')

@section('title','Create Schedule')

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
                <h2 class="card-title" style="text-align: center">Add New Schedule</h2>
            </div>
            <form method="post" action="{{url('schedules')}}" style="margin: 0 15%">
                @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">Driver Name</div>
                            <div class="col">
                                <select name="staffID" id="staffID" required>
                                    <option selected>-- Select A Driver --</option>
                                    @foreach($staffs as $staff)
                                        <option value="{{$staff['staffID']}}">{{$staff['staffFirstName'].' '.$staff['staffLastName']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">Driver Contact No</div>
                            <div class="col">
                                <select name="transportID" id="transportID" required>
                                    <option selected>-- Select A Transport --</option>
                                    @foreach($transports as $transport)
                                        <option value="{{$transport['transportID']}}">{{$transport['carPlate']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">Transport Plat No</div>
                            <div class="col">
                                <select name="regionID" id="regionID" required>
                                    <option selected>-- Select Region --</option>
                                    @foreach($results as $result)
                                        <option value="{{$result->regionID}}">{{$result->postcode.' '.$result->city.', '.$result->State}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">Delivery DateTime</div>
                            <div class="col">
                                <input type="datetime-local" name="dateTimeDelivery" value="{{date('Y-m-d\TH:i', strtotime(Carbon\Carbon::now()))}}">
                            </div>
                        </div>
                    </div>
                    <p style="text-align: center">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <a class="btn btn-default btn-danger" href="{{ url('schedules') }}">Cancel</a>
                    </p>
            </form>
        </div>
    </div>
@endsection
