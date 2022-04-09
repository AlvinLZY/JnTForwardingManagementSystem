@extends('include.master')
@section('title','Customer Page')
@section('body')
<!--//author:Sing Wei Hern-->
<div class="card-body">
    <div class="card-header">
            <h2>Customer Table</h2>
        </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->lastName." ".$item->firstName }}</td>
                    <td>{{ $item->contactNo }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address.", ".$item->postcode." ".$item->city.", ".$item->state }}</td>

                    <td>
                        <a href="{{url('/customer/' . $item->id . '/edit')}}" class="btn btn-warning" >Edit</a>
                    </td>
                    <td>
                        <form action="{{action('CustomerController@destroy',$item->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align:center">
            <button type="button" class="btn btn-success" onclick="window.location='{{ action('CustomerController@create') }}'">Create New Customer</button>
        </div>
    </div>
</div>
@endsection