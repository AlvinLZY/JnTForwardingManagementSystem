@extends('include.Master')
@section('title','Edit Order Page')
@section('body')
 
 

<div class="card-header">View Order Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Order ID: {{ $delivery_orders->orderID }}</h5>
        <p class="card-text">Sender ID : {{ $delivery_orders->senderID }}</p>
        <p class="card-text">Sender Name: {{ $senderID->firstName . $senderID->lastName }}</p>
        <p class="card-text">Receiver ID : {{ $delivery_orders->receiverID }}</p>
        <p class="card-text">Sender Name: {{ $receiverID->firstName . $receiverID->lastName }}</p>
        <p class="card-text">Total Weight : {{ $delivery_orders->totalWeight }}</p>
        <p class="card-text">Parcel Content Category : {{ $delivery_orders->parcelContentCategory }}</p>
        <p class="card-text">Schedule ID : {{ $delivery_orders->scheduleID }}</p>
        <p class="card-text">Created At : {{ $delivery_orders->created_at }}</p>
        <p class="card-text">Updated At : {{ $delivery_orders->updated_at }}</p>
        <a href="{{ url('order') }}" title="Back Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Back Order</button></a>
        </br>
  </div>
       
    </hr>
  
  </div>

  @endsection