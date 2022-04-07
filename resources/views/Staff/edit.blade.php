@extends('include.master')
@section('title','Edit Staff')
@section('body')

<h2>Edit Staff Details</h2><br />
    <form method="post" action="{{action ('StaffController@update', $id) }}">
      @csrf
      <input name="_method" type="hidden" value="PATCH">
      <div class="row mb-3">
            <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

            <div class="col-md-6">
                <input id="staffFirstName" type="text" class="form-control @error('staffFirstName') is-invalid @enderror" name="staffFirstName" value="{{ $staffs->staffFirstName }}" required autocomplete="staffFirstName">

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
                <input id="staffLastName" type="text" class="form-control @error('staffLastName') is-invalid @enderror" name="staffLastName" value="{{ $staffs->staffLastName }}" required autocomplete="staffLastName">

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
                <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ $staffs->contactNo }}" required autocomplete="contactNo">

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
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $staffs->email }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>      
      <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>

@endsection