@extends('include.master')
@section('title','Staff Page')
@section('body')
<!--author:Alvin Lim Zhi Yoong-->
    @if (\Session::has('Success'))
        <div class="alert alert-success">
            <p>{{\Session::get('Success')}}</p>
        </div><br/>
    @elseif(\Session::has('error'))
        <div class="alert alert-danger">
            <p>{{\Session::get('error')}}</p>
        </div><br/>
    @endif
    <div class="card-body">
        <br>
        <h1>Schedule Dashboard</h1>
        <div style="text-align: right">
            <button class="btn btn-success" onclick="window.location='{{action('StaffController@create')}}'">Add New Staff</button>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($staffs as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->staffFirstName." ".$item->staffLastName }}</td>
                        <td>{{ $item->contactNo }}</td>
                        <td>{{ $item->email }}</td>

                        <td>
                            <a href="{{action('StaffController@edit',$item['id'])}}" class="btn btn-warning" >Edit</a>
                        </td>
                        <td>
                            <form action="{{action('StaffController@destroy',$item->id)}}" method="post">
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
