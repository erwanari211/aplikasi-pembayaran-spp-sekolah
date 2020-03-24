@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Payments</div>

        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Class</th>
                <th>Month Year</th>
                <th>Paid At</th>
                <th>Operator</th>
              </tr>
            </thead>
            <tbody>
              @if (count($payments))
                @php
                  $no = $payments->firstItem();
                @endphp
                @foreach ($payments as $payment)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      <a href="{{ route('students.show', $payment->student->id) }}">
                        {{ $payment->student->user->name }}
                      </a>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-outline-secondary"
                        href="{{ route('student-classes.show', $payment->student->student_class_id) }}">
                        {{ $payment->student->studentClass->name }}
                      </a>
                    </td>
                    <td>
                      {{ date('F', mktime(0, 0, 0, $payment->month, 1)) }}
                      {{ $payment->year }}
                    </td>
                    <td>{{ $payment->paid_at }}</td>
                    <td>{{ $payment->user->name }}</td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="99">No data</td>
                </tr>
              @endif
            </tbody>
          </table>

          {{ $payments->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
