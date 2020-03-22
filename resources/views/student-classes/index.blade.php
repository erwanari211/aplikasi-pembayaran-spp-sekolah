@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Classes</div>

        <div class="card-body">
          <div class="mb-4">
            <a class="btn btn-sm btn-primary"
              href="{{ route('student-classes.create') }}">
              Create
            </a>
          </div>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th></th>
                <th>Name</th>
                <th>Major</th>
              </tr>
            </thead>
            <tbody>
              @if (count($classes))
                @php
                  $no = 1;
                @endphp
                @foreach ($classes as $class)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      <a class="btn btn-sm btn-outline-secondary"
                        href="{{ route('student-classes.show', $class->id) }}">
                        Show
                      </a>
                      <a class="btn btn-sm btn-success"
                        href="{{ route('student-classes.edit', $class->id) }}">
                        Edit
                      </a>
                    </td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->major }}</td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="99">No data</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
