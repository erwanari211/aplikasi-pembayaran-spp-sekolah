@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

            @if (auth()->check())
              @if (auth()->user()->is_admin)
                <div class="card my-4">
                    <div class="card-header">Admin Menu</div>

                    <div class="card-body">
                      <div class="list-group">
                        <a class="list-group-item"
                          href="{{ route('students.index') }}">
                          Students
                        </a>
                        <a class="list-group-item"
                          href="{{ route('student-classes.index') }}">
                          Class
                        </a>
                        <a class="list-group-item"
                          href="{{ route('student-spps.index') }}">
                          SPP
                        </a>
                        <a class="list-group-item"
                          href="{{ route('operators.index') }}">
                          Operators
                        </a>
                      </div>
                    </div>
                </div>
              @endif

              @if (auth()->user()->role == 'student')
                @php
                  $user = auth()->user();
                  $student = $user->student;
                  $studentPayments = $student->payments
                @endphp
                @if (isset($studentPayments))
                  @include('payments.student-payments')
                @endif
              @endif
            @endif

        </div>
    </div>
</div>
@endsection
