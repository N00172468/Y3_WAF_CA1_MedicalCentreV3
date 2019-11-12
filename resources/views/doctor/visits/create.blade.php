@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add New Visit:
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
            <form method="POST" action="{{ route('doctor.visits.store') }}">
              <input type="hidden" name="_token" value="{{csrf_token() }}">
              <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" />
              </div>
              <div class="form-group">
                <label for="time_start">Time Start</label>
                <input type="text" class="form-control" id="time_start" name="time_start" value="{{ old('time_start') }}" />
              </div>
              <div class="form-group">
                <label for="time_end">Time End</label>
                <input type="text" class="form-control" id="time_end" name="time_end" value="{{ old('time_end') }}" />
              </div>
              <div class="form-group">
                <label for="duration_of_visit">Duration of Visit</label>
                <input type="text" class="form-control" id="duration_of_visit" name="duration_of_visit" value="{{ old('duration_of_visit') }}" />
              </div>
              <div class="form-group">
                <label for="cost_of_visit">Cost of Visit</label>
                <input type="text" class="form-control" id="cost_of_visit" name="cost_of_visit" value="{{ old('cost_of_visit') }}" />
              </div>
              <a href="{{ route('doctor.visits.index') }}" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
