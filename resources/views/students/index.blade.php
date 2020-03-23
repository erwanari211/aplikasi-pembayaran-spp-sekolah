@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Students</div>

        <div class="card-body">
          <div class="mb-4">
            <a class="btn btn-sm btn-primary"
              href="{{ route('students.create') }}">
              Create
            </a>
          </div>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th></th>
                <th>Name</th>
                <th>NISN</th>
                <th>Class</th>
              </tr>
            </thead>
            <tbody>
              @if (count($students))
                @php
                  $no = $students->firstItem();
                @endphp
                @foreach ($students as $student)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      <a class="btn btn-sm btn-outline-secondary"
                        href="{{ route('students.show', $student->id) }}">
                        Show
                      </a>
                      <a class="btn btn-sm btn-success"
                        href="{{ route('students.edit', $student->id) }}">
                        Edit
                      </a>
                    </td>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->user->username }}</td>
                    <td>{{ $student->studentClass->name }}</td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="99">No data</td>
                </tr>
              @endif
            </tbody>
          </table>

          {{ $students->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
