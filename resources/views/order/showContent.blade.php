<?php
use App\Models\xslTrans
?>
@extends('include.Master')
@section('title','Content Desc Page')

@section('body')
<div class="card-header">
    <h2>Parcel Content Category Description</h2>
  </div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Parcel Type</th>
                <th>Price (RM)</th>
                <th>Description </th>
            </tr>
        </thead>
        <tbody>
        @foreach($xmlObject as $item)
            <tr>
                <td>{{ $item->parcel }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="card-body">
  <a href="{{ url('order') }}" title="Back Order"><button class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i>Back Order</button></a></p>
</div>
@endsection