@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Operators</div>

        <div class="card-body">
          <div class="mb-4">
            <a class="btn btn-sm btn-primary"
              href="{{ route('operators.create') }}">
              Create
            </a>
          </div>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th></th>
                <th>Name</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>
              @if (count($operators))
                @php
                  $no = $operators->firstItem();
                @endphp
                @foreach ($operators as $operator)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      <a class="btn btn-sm btn-outline-secondary"
                        href="{{ route('operators.show', $operator->id) }}">
                        Show
                      </a>
                      <a class="btn btn-sm btn-success"
                        href="{{ route('operators.edit', $operator->id) }}">
                        Edit
                      </a>
                    </td>
                    <td>{{ $operator->name }}</td>
                    <td>{{ $operator->username }}</td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="99">No data</td>
                </tr>
              @endif
            </tbody>
          </table>

          {{ $operators->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
