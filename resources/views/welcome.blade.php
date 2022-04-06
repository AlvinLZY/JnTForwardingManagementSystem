@extends('include.Master')

@section('title','Home')

@section('body')
    <div>
        <h3>Welcome.blade.php</h3>
        <button onclick="window.location='{{action('ScheduleController@index')}}'">To Schedule||View.blade.php</button>
        <button onclick="window.location='{{action('PaymentController@index')}}'">To payment||paymentIndex.blade.php</button>
    </div>
@endsection
