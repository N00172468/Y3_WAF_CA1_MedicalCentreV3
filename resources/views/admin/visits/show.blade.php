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
        <h1 class="gold">Date: {{ $visit->date }} | Doctor: {{ $visit->doctor->user->name }} | Patient: {{ $visit->patient->user->name }}</h1>

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
                    <td class="gold">Date</td>
                    <td>{{ $visit->date }}</td>
                    @if ($visit->cancelled)
                      <span class="badge badge-danger float-right" style="padding: 10px; margin: 0.5px">
                        Visit has been cancelled.
                      </span>
                    @endif
                  </tr>
                  <tr>
                    <td class="gold">Doctor</td>
                    <td>{{ $visit->doctor->user->name }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Patient</td>
                    <td>{{ $visit->patient->user->name }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Time Start</td>
                    <td>{{ $visit->time_start }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Time End</td>
                    <td>{{ $visit->time_end }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Duration of Visit</td>
                    <td>{{ $visit->duration_of_visit }}</td>
                  </tr>
                  <tr>
                    <td class="gold">Cost of Visit</td>
                    <td>{{ $visit->cost_of_visit }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('admin.visits.index') }}" class="btn btn-info">Back</a>
              <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
              @if (!$visit->cancelled && $visit->date >= date('Y-m-d'))
                <a href="{{ route('admin.visits.cancel', $visit->id) }}" class="btn btn-danger float-right" style="margin: 0.5px">
                  Cancel Visit
                </a>
              @endif
              <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
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
