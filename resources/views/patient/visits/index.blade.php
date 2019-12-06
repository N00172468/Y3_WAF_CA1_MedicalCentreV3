<style>
  .container {
    color: #dddd !important;
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
  <div class="fluid-container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header gold">
            Visits:
          </div>
          <div class="card-body">
            @if (count($visits) === 0)
              <p>There are no visits on record!</p>
            @else
              <table id="table-visits" class="table table-hover text">
                <thead class="gold">
                  <th>Date</th>
                  <th>Doctor</th>
                  <th>Patient</th>
                  <th>Time Start</th>
                  <th>Time End</th>
                  <th>Duration of Visit</th>
                  <th>Cost of Visit</th>
                  <th></th>
                </thead>
                <tbody>
                  @foreach ($visits as $visit)
                    <tr data-id="{{ $visit->id }}">
                      <td>{{ $visit->date }}
                        @if ($visit->cancelled)
                          <span class="badge badge-danger" style="padding: 10px; margin: 0.5px">
                            Visit has been cancelled.
                          </span>
                        @endif
                      </td>
                      <td>{{ $visit->doctor->user->name }}</td>
                      <td>{{ $visit->patient->user->name }}</td>
                      <td>{{ $visit->time_start }}</td>
                      <td>{{ $visit->time_end }}</td>
                      <td>{{ $visit->duration_of_visit }}</td>
                      <td>{{ $visit->cost_of_visit }}</td>
                      <td>
                        <a href="{{ route('patient.visits.show', $visit->id) }}" class="btn btn-info">View</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
