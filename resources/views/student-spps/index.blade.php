@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">SPP</div>

        <div class="card-body">
          <div class="mb-4">
            <a class="btn btn-sm btn-primary"
              href="{{ route('student-spps.create') }}">
              Create
            </a>
          </div>

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th></th>
                <th>Year</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              @if (count($spps))
                @php
                  $no = 1;
                @endphp
                @foreach ($spps as $spp)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      <a class="btn btn-sm btn-outline-secondary"
                        href="{{ route('student-spps.show', $spp->id) }}">
                        Show
                      </a>
                      <a class="btn btn-sm btn-success"
                        href="{{ route('student-spps.edit', $spp->id) }}">
                        Edit
                      </a>
                    </td>
                    <td>{{ $spp->year }}</td>
                    <td>{{ $spp->amount }}</td>
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
