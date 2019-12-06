<style>
  .container {
    color: #dddd;
  }

  .gold {
    color: #b8860b;
  }

  .faded {
    color: #7a7a7a;
  }

  .divider {
    height: 2px;
    background-color: #b8860b;
    /* background-color: #7851a9; */
    border: none;
    margin-top: 1px;
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
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h1 class="gold">Profile</h1>
        <hr class="divider">
      </div>

      <div class="col-md-6">
          <div>
              <div class="card-body display-4 text-center faded">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  <span>Welcome, Admin {{ Auth::user()->name }}.
              </div>
          </div>
      </div>

        <div class="col-md-6">
            <div class="card details">
                <div class="card-header gold">Details</div>

                <div class="card-body">
                  <span class="gold">Address:</span> {{ Auth::user()->address }}
                  <br/>
                  <span class="gold">Phone:</span> {{ Auth::user()->phone }}
                  <br/>
                  <span class="gold">Email:</span> {{ Auth::user()->email }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
