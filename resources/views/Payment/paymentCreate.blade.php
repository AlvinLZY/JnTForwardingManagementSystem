@extends('include.Master')
@section('title','Edit Order Page')
@section('body')

<html>
	<head>
		<meta charset="utf-8">
		<title>Payment</title>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
	</head>
	<body>
		<h2>Create New Payment</h2><br/>
        
		<form method="post" action="{{url('payments')}}">
			@csrf
                         <p>
                            <label for="deliveryOrderID">Delivery Order ID:</label>
                            
                            <select id="deliveryOrderID" name="deliveryOrderID">
                                <option disabled selected value>--- Select an Order ---</option>
                                @foreach ($orders as $order)
                                <option value="{{$order['orderID']}}">{{$order['orderID']}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            
				<label for="totalAmount">Total Amount:</label>
                                <input type="number" name="totalAmount">
                             
			</p>
			<p>
				<label for="paymentType">Payment Type:</label>
				<select name="paymentType" id="paymentType">
                                    <option value="eWallet">E-Wallet</option>
                                    <option value="Cash">Cash</option>
                                    <option value="card">Card</option>
                                </select>
			</p>
                        <p>
				<label for="status">Status:</label>
				<input type="text" name="status">
			</p>
			<p>
                            <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                            <button class="btn btn-success" type="submit">Submit</button>
			</p>
		</form>
	</body>
</html>
@endsection