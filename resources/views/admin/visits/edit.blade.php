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
            Edit Visit:
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
            <form method="POST" action="{{ route('admin.visits.update', $visit->id) }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{csrf_token() }}">
              <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control holder" id="date" name="date" value="{{ old('date', $visit->date) }}" />
              </div>
              <div class="form-group">
                <label for="doctor">Doctor</label>
                <br/>
                <select class="form-control holder" name="doctor_id">
                  @foreach ($doctors as $doctor)
                    <option value={{ $doctor->id }}  {{ (old('doctor_id', $visit->doctor_id) == $doctor->id) ? "selected" : "" }}>
                      {{ $doctor->user->name }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="patient">Patient</label>
                <br/>
                <select class="form-control holder" name="patient_id">
                  @foreach ($patients as $patient)
                    <option value={{ $patient->id }}  {{ (old('patient_id', $visit->patient_id) == $patient->id) ? "selected" : "" }}>
                      {{ $patient->user->name }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="time_start holder">Time Start</label>
                <input type="text" class="form-control holder" id="time_start" name="time_start" value="{{ old('time_start', $visit->time_start) }}" />
              </div>
              <div class="form-group">
                <label for="time_end">Time End</label>
                <input type="text" class="form-control holder" id="time_end" name="time_end" value="{{ old('time_end', $visit->time_end) }}" />
              </div>
              <div class="form-group">
                <label for="duration_of_visit">Duration of Visit</label>
                <input type="text" class="form-control holder" id="duration_of_visit" name="duration_of_visit" value="{{ old('duration_of_visit', $visit->duration_of_visit) }}" />
              </div>
              <div class="form-group">
                <label for="cost_of_visit">Cost of Visit</label>
                <input type="text" class="form-control holder" id="cost_of_visit" name="cost_of_visit" value="{{ old('cost_of_visit', $visit->cost_of_visit) }}" />
              </div>
              <a href="{{ route('admin.visits.index') }}" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
