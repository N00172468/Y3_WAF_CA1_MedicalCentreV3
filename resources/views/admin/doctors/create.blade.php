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
            Add New Doctor:
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
            <form method="POST" action="{{ route('admin.doctors.store') }}">
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
              <div class="form-group">
                <label for="date_started">Date Started</label>
                <input type="date" class="form-control holder" id="date_started" name="date_started" value="{{ old('date_started') }}" />
              </div>
              <a href="{{ route('admin.doctors.index') }}" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
