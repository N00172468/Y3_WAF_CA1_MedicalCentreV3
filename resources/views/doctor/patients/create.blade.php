<style>
  .title {
    color: #b8860b;
    text-shadow: 1px 1px 3px black;
  }

  .row {
    color: #dddd !important;
  }

  .holder {
    background-color: #454545 !important;
    color: #ddd !important;
  }
</style>

@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-2">
        <div class="card">
          <div class="card-header title">
            Add New Patient:
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('doctor.patients.store') }}">
              <input type="hidden" name="_token" value="{{csrf_token() }}">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control holder" id="name" name="name" value="{{ old('name') }}" />
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control holder" id="address" name="address" value="{{ old('address') }}" />
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control holder" id="phone" name="phone" value="{{ old('phone') }}" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control holder" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-check">
                <label for="health_insurance">Health Insurance</label>
                <input type="checkbox" class="form-control holder" id="health_insurance" name="health_insurance" value="false, {{ old('health_insurance') }}" />
              </div>
              <div class="form-group">
                <label for="policy_no">Policy Number</label>
                <input type="text" class="form-control holder" id="policy_no" name="policy_no" value="{{ old('policy_no') }}" />
              </div>
              <a href="{{ route('doctor.patients.index') }}" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
