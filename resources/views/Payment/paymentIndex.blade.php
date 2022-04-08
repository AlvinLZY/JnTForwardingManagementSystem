@extends('include.Master')
@section('title','Edit Order Page')
@section('body')

<div class="container">
<br />
@if (\Session::has('success'))
        <div class="alert alert-success">
                <p>{{\Session::get('success') }}</p>
        </div> <br />
        @endif
        <div class="card-header">
            <h2>Payment Table</h2>
        </div>
        <table class="table table-striped">
                <thead>
                        <tr>
                                <th>Payment ID</th>
                                <th>Delivery Order ID</th>
                                <th>Total Amount</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th colspan="2">Action</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach($payments as $payment)
                        <tr>
                                <td>{{$payment['paymentID']}}</td>
                                <td>{{$payment['deliveryOrderID']}}</td>
                                <td>{{$payment['totalAmount']}}</td>
                                <td>{{$payment['paymentType']}}</td>
                                <td>{{$payment['status']}}</td>
                                <td>{{$payment['created_at']}}</td>
                                <td>
                                        <a href="{{action('PaymentController@show', $payment['paymentID'])}}" class="btn btn-info btn-sm">View</a>
                                </td>
                                <td>
                                        <a href="{{action('PaymentController@edit', $payment['paymentID'])}}" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                        <form action="{{action('PaymentController@destroy', $payment['paymentID'])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                </td>
                        </tr>
                        @endforeach	
                </tbody>
        </table>
        <div style="text-align:center"><button type="button" class="btn btn-success btn-sm" onclick="window.location='{{ action('PaymentController@create') }}'">Create New Payment</button></div>
</div>
@endsection