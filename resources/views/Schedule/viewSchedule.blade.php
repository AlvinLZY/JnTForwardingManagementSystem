<?php
use Illuminate\Support\Facades;
use App\Http\Controllers;
?>

@extends('include.Master')

@section('title','View Schedule')
    @section('body')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SSS</th>
                    <th>Driver Name</th>
                    <th>Transport Plat No</th>
                    <th>Date Created</th>
                    <th>Destination Region</th>
                    <th>Deliver DateTime</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{$schedule['id']}}</td>
                    <td>{{$schedule['code']}}</td>
                    <td>{{$schedule['name']}}</td>

                    <td>
                        <a href="{{action('ProductController@edit',$product['id'])}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{action('ProductController@destroy',$product['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endsection
