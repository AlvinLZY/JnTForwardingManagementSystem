@extends('include.master')
@section('title','Customer Page')
@section('body')

<div class="card-body">
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
            @foreach($customers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->lastName." ".$item->firstName }}</td>
                    <td>{{ $item->contactNo }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>

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
    </div>
</div>
@endsection