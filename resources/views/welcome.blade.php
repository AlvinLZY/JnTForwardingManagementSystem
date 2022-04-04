@extends('include.Master')

@section('title','Home')

@section('body')
    <div>
        <h3>XR.Welcome.blade.php</h3>
        <button onclick="window.location='{{action('ScheduleController@index')}}'">To Schedule||View.blade.php</button>
    </div>
@endsection
