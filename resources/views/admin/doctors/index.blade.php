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
            Doctors:
            <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($doctors) === 0)
              <p>There are no Doctors on record!</p>
            @else
              <table id="table-doctors" class="table table-hover text">
                <thead class="gold">
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Date Started</th>
                  <th>Dr. I.D</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($doctors as $doctor)
                    <tr data-id="{{ $doctor->id }}">
                      <td>{{ $doctor->user->name }}</td>
                      <td>{{ $doctor->user->address }}</td>
                      <td>{{ $doctor->user->phone }}</td>
                      <td>{{ $doctor->user->email }}</td>
                      <td>{{ $doctor->date_started }}</td>
                      <td>{{ $doctor->id }}</td>
                      <td>
                        <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}">
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
