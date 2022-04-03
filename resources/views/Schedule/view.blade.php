<?php
use Illuminate\Support\Facades;
use App\Http\Controllers;
?>

@extends('include.Master')

@section('title','Schedule')
    @section('body')
        <div>
            <h3>view.blade.php</h3>
            <button onclick="window.location='{{action('MasterController@backWelcome')}}'">To Schedule||View.blade.php</button>
        </div>
    @endsection
