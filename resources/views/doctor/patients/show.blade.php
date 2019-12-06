<style>
  .container {
    color: #dddd !important;
  }

  .divider {
    height: 2px;
    background-color: #b8860b;
    /* background-color: #7851a9; */
    border: none;
    margin-top: 1px;
  }

  .text {
    color: #dddd !important;
  }

  .gold {
    color: #b8860b;
  }

  .card-header {
    font-size: 32px;
  }

  .card-body {
    font-size: 22px;
  }
</style>

@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="gold">Patient {{ $patient->user->name }}</h1>
        <hr class="divider">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-md-offset-2">
        <div class="card">
          <div class="card-body">
              <table class="table table-hover text">
                <tbody>
                  <tr>
                    <td class="gold">Name</td>
                    <td>{{ $patient->user->name }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Address</td>
                    <td>{{ $patient->user->address }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Phone</td>
                    <td>{{ $patient->user->phone }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Email</td>
                    <td>{{ $patient->user->email }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Date Started</td>
                    <td>{{ $patient->health_insurance }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Policy Number</td>
                    <td>{{ $patient->policy_no }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Patient I.D</td>
                    <td>{{ $patient->id }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('doctor.patients.index') }}" class="btn btn-info">Back</a>
              <a href="{{ route('doctor.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
              <form style="display:inline-block" method="POST" action="{{ route('doctor.patients.destroy', $patient->id) }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="form-control btn btn-danger">Delete</a>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
