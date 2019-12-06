<style>
  .title {
    color: #b8860b;
  }

  .divider {
    height: 2px;
    background-color: #b8860b;
    /* background-color: #7851a9; */
    border: none;
    margin-top: 1px;
  }

  .content {
    color: #7a7a7a;
  }
</style>

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <h1 class="title">
        About
      </h1>
  </div>

  <hr class="divider">

  <div class="row justify-content-center text-center">
      <h1 class="content display-1">
        John Carlo M. Ramos
      </h1>
  </div>

  <div class="row justify-content-center text-center">
      <h1 class="content display-1">
        DL836 | Year 3
      </h1>
  </div>

  <div class="row justify-content-center text-center">
      <h1 class="content display-1">
        W.A.F
      </h1>
  </div>

  <div class="row justify-content-center text-center">
      <h1 class="content display-1">
        CA1
      </h1>
  </div>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <div class="row justify-content-center text-center">
      <h1 class="content display-1">
        Fueled by coffee, <br/> living for coffee.
      </h1>
  </div>
  <div class="row justify-content-center">
      <p class="content">
        Please send help 🙃
      </p>
  </div>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">About</div>

                <div class="card-body">
                    Fueled by coffee, living for coffee. Pls send help.
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
