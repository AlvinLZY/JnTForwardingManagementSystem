@extends('include.Master')

@section('title','Home')

@section('body')
    <div>
        <h3>Welcome To JnT Ekspress</h3>
        <img src="{{asset('Logo.jpg')}}" style="width:100%"><br><br>
        <button class="btn btn-outline-info" onclick="window.location='{{action('OrderController@index')}}'" style="margin: 2%">Order</button>
        <button class="btn btn-outline-info" onclick="window.location='{{action('PaymentController@index')}}'" style="margin: 2%">Payment</button>
        <button class="btn btn-outline-info" onclick="window.location='{{action('ScheduleController@index')}}'" style="margin: 2%">Schedule</button>
        <button class="btn btn-outline-info" onclick="window.location='{{action('CustomerController@index')}}'" style="margin: 2%">Customer</button>

        @auth
        @if(checkPermission(['admin']))
        <button class="btn btn-outline-info" onclick="window.location='{{action('ScheduleController@index')}}'">User</button>
        @endif
        @endauth
    </div>
@endsection
