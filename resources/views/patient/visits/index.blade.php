@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Visits:
          </div>
          <div class="card-body">
            @if (count($visits) === 0)
              <p>There are no visits on record!</p>
            @else
              <table id="table-visits" class="table table-hover">
                <thead>
                  <th>Date</th>
                  <th>Time Start</th>
                  <th>Time End</th>
                  <th>Duration of Visit</th>
                  <th>Cost of Visit</th>
                  <th></th>
                </thead>
                <tbody>
                  @foreach ($visits as $visit)
                    <tr data-id="{{ $visit->id }}">
                      <td>{{ $visit->date }}</td>
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
