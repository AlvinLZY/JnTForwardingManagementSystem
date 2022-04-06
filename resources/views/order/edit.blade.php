@extends('include.Master')
@section('title','Edit Order Page')
@section('body')
                
 
<div class="card">
  <div class="card-header">Edit Order Page</div>
  <div class="card-body">
      
      
      <form action="{{ action ('OrderController@update', $delivery_orders) }}" method="post">
      <!--<form action="{{ url('/order/' . $delivery_orders->delivery_orders) }}" method="post">-->
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <label>Order ID</label></br>
        <text type="text" name="orderID" id="orderID" value="{{$delivery_orders->orderID}}"  id="orderID" class="form-control"/>{{$delivery_orders->orderID}}</text><br>
        <label>Sender ID</label></br>
        <select name="senderID" id="senderID" class="form-control">
          @foreach($customers as $customer)
              <option value="{{$customer['customerID']}}" class="form-control">{{$customer['firstName']. ' ' .$customer['lastName']}}</option>
          @endforeach
        </select>
        </br>
        <label>Receiver ID</label></br>
        <select name="receiverID" id="receiverID" class="form-control">
          @foreach($customers as $customer)
              <option value="{{$customer['customerID']}}" class="form-control">{{$customer['firstName']. ' ' .$customer['lastName']}}</option>
          @endforeach
        </select>
        </br>
        <label>Total Weight</label></br>
        <input type="text" name="totalWeight" id="totalWeight" value="{{$delivery_orders->totalWeight}}" class="form-control"></br>
        <label>Parcel Content Category</label></br>
        <input type="text" name="parcelContentCategory" id="parcelContentCategory" value="{{$delivery_orders->parcelContentCategory}}" class="form-control"></br>
        <label>Schedule ID</label></br>
        <input type="text" name="scheduleID" id="scheduleID" value="{{$delivery_orders->scheduleID}}" class="form-control"></br>
        <p><input type="submit" value="Update" class="btn btn-success">
        <a href="{{ url('order') }}" title="Back Order"><button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>Back Order</button></a></p>
        </br>
    </form>
   
  </div>
</div>
 
@endsection
