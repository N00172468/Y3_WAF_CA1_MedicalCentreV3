@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Date: {{ $visit->date }} | Time: {{ $visit->time_start }} - {{ $visit->time_end }}
          </div>
          <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Date</td>
                    <td>{{ $visit->date }}</td>
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
              <a href="{{ route('admin.visits.index') }}" class="btn btn-info">Back</a>
              <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
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
