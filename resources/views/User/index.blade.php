@extends('include.master')
@section('title','User Page')
@section('body')

<div class="card-body">
    <div class="card-header">
            <h2>User Table</h2>
        </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($xml as $item)
            @if ($item->id !=1)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->firstName." ".$item->lastName }}</td>
                    <td>{{ $item->contactNo }}</td>
                    <td>{{ $item->email }}</td>

                    <td>
                        <a href="{{url('/User/' . $item->id . '/edit')}}" class="btn btn-warning" >Edit</a>
                    </td>
                    <td>
                        <form action="{{action('UserController@destroy',$item->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        <div style="text-align:center">
            <button type="button" class="btn btn-success" onclick="window.location='register'">Create New User</button>
            <button type="button" class="btn btn-success" onclick="window.location='{{action('UserController@showXML')}}'">Show User(.xml)</button>
        </div>
    </div>
</div>
@endsection