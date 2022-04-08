@extends('include.Master')
@section('title','Edit Order Page')
@section('body')
 
 

<div class="card-header">Payment Details</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Payment ID : {{ $payment->paymentID }}</h5>
        <p class="card-text">Delivery Order ID : {{ $payment->deliveryOrderID }}</p>
        <p class="card-text">Total Amount : {{ $payment->totalAmount }}</p>
        <p class="card-text">Payment Type : {{ $payment->paymentType }}</p>
        <p class="card-text">Status : {{ $payment->status }}</p>
        
        <a href="{{ url('paymentIndex') }}" title="Back to Index"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Back to Index</button></a>
        </br>
  </div>
       
    </hr>
  
  </div>

  @endsection

