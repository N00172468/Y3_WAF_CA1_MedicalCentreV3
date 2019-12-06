@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Date: {{ $visit->date }} | Doctor: {{ $visit->doctor->user->name }} | Patient: {{ $visit->patient->user->name }}
            @if ($visit->cancelled)
              <span class="badge badge-danger float-right" style="padding: 10px; margin: 0.5px">
                Visit has been cancelled.
              </span>
            @endif
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Date</td>
                    <td>{{ $visit->date }}</td>
                  </tr>
                  <tr>
                    <td>Doctor</td>
                    <td>{{ $visit->doctor->user->name }}</td>
                  </tr>
                  <tr>
                    <td>Patient</td>
                    <td>{{ $visit->patient->user->name }}</td>
                  </tr>
                  <tr>
                    <td>Time Start</td>
                    <td>{{ $visit->time_start }}</td>
                  </tr>
                  <tr>
                    <td>Time End</td>
                    <td>{{ $visit->time_end }}</td>
                  </tr>
                  <tr>
                    <td>Duration of Visit</td>
                    <td>{{ $visit->duration_of_visit }}</td>
                  </tr>
                  <tr>
                    <td>Cost of Visit</td>
                    <td>{{ $visit->cost_of_visit }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ route('doctor.visits.index') }}" class="btn btn-info">Back</a>
              <a href="{{ route('doctor.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
              @if (!$visit->cancelled && $visit->date >= date('Y-m-d'))
                <a href="{{ route('doctor.visits.cancel', $visit->id) }}" class="btn btn-danger float-right" style="margin: 0.5px">
                  Cancel Visit
                </a>
              @endif
              <form style="display:inline-block" method="POST" action="{{ route('doctor.visits.destroy', $visit->id) }}">
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
