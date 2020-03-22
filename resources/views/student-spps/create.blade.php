@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create SPP</div>

        <div class="card-body">
          @if (session('successMessage'))
            <div class="alert alert-success">
              {{ session('successMessage') }}
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('student-spps.store') }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                Year
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('year') is-invalid @enderror"
                  id="year"
                  name="year"
                  value="{{ old('year') }}"
                  required>

                @error('year')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="major" class="col-md-4 col-form-label text-md-right">
                Amount
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('amount') is-invalid @enderror"
                  id="amount"
                  name="amount"
                  value="{{ old('amount') }}"
                  required>

                @error('amount')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Submit
                </button>

                <a class="btn btn-outline-secondary"
                  href="{{ route('student-spps.index') }}">
                  Back
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
