@extends('include.Master')
@section('title','Edit Order Page')
@section('body')

@if (\Session::has('Success'))
    <div class="alert alert-success">
        <p>{{\Session::get('Success')}}</p>
    </div><br/>
@elseif(\Session::has('error'))
    <div class="alert alert-danger">
        <p>{{\Session::get('error')}}</p>
    </div><br/>
@endif

 
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
              <option  class="form-control" value="{{$customer['customerID']}}" {{$customer->customerID == $delivery_orders->senderID ? 'selected' : '' }}>{{$customer['firstName']. ' ' .$customer['lastName']}}</option>
          @endforeach
        </select>
        </br>
        <label>Receiver ID</label></br>
        <select name="receiverID" id="receiverID" class="form-control">
          @foreach($customers as $customer)
              <option class="form-control" value="{{$customer['customerID']}}"{{$customer->customerID == $delivery_orders->receiverID ? 'selected' : '' }}>{{$customer['firstName']. ' ' .$customer['lastName']}}</option>
          @endforeach
        </select>
        </br>
        <label>Total Weight</label></br>
        <input type="text" name="totalWeight" id="totalWeight" value="{{$delivery_orders->totalWeight}}" class="form-control"></br>
        
        <label>Parcel Content Category</label></br>
        <select id="parcelContentCategory" name="parcelContentCategory" value="{{ $delivery_orders->parcelContentCategory }}" onchange='checkvalue(this.value)' >
          <option value="Food">Food</option>
          <option value="Document">Document</option>
          <option value="Box">Box</option>
          <option value="Electronic">Electronic</option>
        </select>
        </br>
        <label>Schedule ID</label></br>
        <input type="text" name="scheduleID" id="scheduleID" value="{{$delivery_orders->scheduleID}}" class="form-control"></br>
        <p><input type="submit" value="Update" class="btn btn-success">
        <a href="{{ url('order') }}" title="Back Order"><button class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i>Back Order</button></a></p>
        </br>
    </form>
   
  </div>
</div>

 
@endsection
