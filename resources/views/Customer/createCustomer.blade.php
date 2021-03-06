@extends('include.master')
@section('title','Create Customer')
<!--//author:Sing Wei Hern-->
@section('body')
<h2>Insert new customer</h2><br/>
<form method="post" action="{{url('customer')}}">
        @csrf
        <div class="row mb-3">
            <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

            <div class="col-md-6">
                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName">

                @error('firstName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

            <div class="col-md-6">
                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName">

                @error('lastName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="contactNo" class="col-md-4 col-form-label text-md-end">{{ __('Contact No') }}</label>

            <div class="col-md-6">
                <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ old('contactNo') }}" required autocomplete="contactNo">

                @error('contactNo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autocomplete="address">
            </div>
        </div>
        <div class="row mb-3">
            <label for="region" class="col-md-4 col-form-label text-md-end">{{ __('Region') }}</label>

            <div class="col-md-6">
                <select class="form-control" id="region" name="region">
                    <option disabled selected value>--- Select region ---</option>
                    @foreach ($regions as $region)
                    <option value="{{$region['regionID']}}">{{$region['postcode']." ".$region['city'].", ".$region['state']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                </button>
            </div>
        </div>
</form>
@endsection