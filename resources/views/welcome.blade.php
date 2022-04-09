@extends('include.Master')

@section('title','Home')

@section('body')
    <div>
        <h3>Welcome To JnT Ekspress</h3>
        <button class="btn btn-outline-info" onclick="window.location='{{action('OrderController@index')}}'">Order</button>
        <button class="btn btn-outline-info" onclick="window.location='{{action('PaymentController@index')}}'">Payment</button>
        <button class="btn btn-outline-info" onclick="window.location='{{action('ScheduleController@index')}}'">Schedule</button>
        <button class="btn btn-outline-info" onclick="window.location='{{action('CustomerController@index')}}'">Customer</button>
        
        @auth
        @if(checkPermission(['admin']))
        <button class="btn btn-outline-info" onclick="window.location='{{action('ScheduleController@index')}}'">User</button>  
        @endif
        @endauth
    </div>
@endsection
