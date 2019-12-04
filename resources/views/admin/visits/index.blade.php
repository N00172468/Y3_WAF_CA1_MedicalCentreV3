@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Visits:
            <a href="{{ route('admin.visits.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($visits) === 0)
              <p>There are no Visits on record!</p>
            @else
              <table id="table-visits" class="table table-hover">
                <thead>
                  <th>Date</th>
                  <th>Doctor</th>
                  <th>Patient</th>
                  <th>Time Start</th>
                  <th>Time End</th>
                  <th>Duration of Visit</th>
                  <th>Cost of Visit</th>
                  <th>Actions</th>
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
                        <a href="{{ route('admin.visits.show', $visit->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="form-control btn btn-danger">Delete</a>
                        </form>
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
