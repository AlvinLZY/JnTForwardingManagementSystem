@extends('include.Master')
@section('title','Order Page')
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
                    <div class="card-header">
                        <h2>Order Now</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/order/create') }}" class="btn btn-warning btn-sm" title="Add New Order">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a href="{{ action('xmlController@readXml') }}" class="btn btn-warning btn-sm" title="View Parcel Content Available">
                            <i class="fa fa-plus" aria-hidden="true"></i> View Parcel Content Available
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Sender ID</th>
                                        <th>Receiver ID</th>
                                        <th>Total Weight</th>
                                        <th>Parcel Content Category</th>
                                        <th>Schedule ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($delivery_orders as $item)
                                    <tr>
                                        <td>{{ $item->orderID }}</td>
                                        <td>{{ $item->senderID }}</td>
                                        <td>{{ $item->receiverID }}</td>
                                        <td>{{ $item->totalWeight }}</td>
                                        <td>{{ $item->parcelContentCategory }}</td>
                                        <td>{{ $item->scheduleID }}</td>
 
                                        <td>
                                            <a href="{{ url('/order/' . $item->orderID) }}" title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/order/' . $item->orderID . '/edit') }}" title="Edit Order"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/order' . '/' . $item->orderID) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
@endsection