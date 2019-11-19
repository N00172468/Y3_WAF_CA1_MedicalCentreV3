@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard - Doctors</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <hr/>
                    Welcome, Doctor {{ Auth::user()->name }}.
                    <a href="{{ route('doctor.visits.index') }}">View Your Visits</a>
                    <hr/>
                    DETAILS:
                    <br/>
                    Email: {{ Auth::user()->email }}
                    <br/>
                    Date Started in Eastwood Medical Centre: {{ Auth::user()->doctor->date_started }}
                    <br/>
                    I.D: {{ Auth::user()->doctor->user_id }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
