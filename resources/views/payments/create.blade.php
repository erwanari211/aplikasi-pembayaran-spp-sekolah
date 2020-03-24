@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create Payment</div>

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

          <form method="POST" action="{{ route('payments.store') }}">
            @csrf

            <div class="form-group row d-none">
              <label for="student_id" class="col-md-4 col-form-label text-md-right">
                Student ID
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('student_id') is-invalid @enderror"
                  id="student_id"
                  name="student_id"
                  value="{{ $student->id }}"
                  required>

                @error('student_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row d-none">
              <label for="student_spp_id" class="col-md-4 col-form-label text-md-right">
                SPP ID
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('student_spp_id') is-invalid @enderror"
                  id="student_spp_id"
                  name="student_spp_id"
                  value="{{ $student->student_spp_id }}"
                  required>

                @error('student_spp_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                Name
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="name"
                  name="name"
                  value="{{ $student->user->name }}"
                  disabled
                  required>

                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="class" class="col-md-4 col-form-label text-md-right">
                Class
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('class') is-invalid @enderror"
                  id="class"
                  name="class"
                  value="{{ $student->studentClass->name }}"
                  disabled
                  required>

                @error('class')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="year" class="col-md-4 col-form-label text-md-right">
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

            @php
              for ($i=1; $i <= 12; $i++) {
                $dropdown['months'][$i] = date('F', mktime(0, 0, 0, $i, 1));
              }
            @endphp

            <div class="form-group row">
              <label for="month" class="col-md-4 col-form-label text-md-right">
                Month
              </label>
              <div class="col-md-6">
                <select
                  name="month"
                  id="month"
                  class="form-control"
                  required>
                  <option value="">Please Select</option>
                  @foreach ($dropdown['months'] as $month => $monthName)
                    <option value="{{ $month }}"
                      {{ old('month') == $month ? 'selected' : '' }}>
                      {{ $monthName }}
                    </option>
                  @endforeach
                </select>

                @error('month')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="amount" class="col-md-4 col-form-label text-md-right">
                Amount
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('amount') is-invalid @enderror"
                  id="amount"
                  name="amount"
                  value="{{ old('amount', $student->studentSpp->amount) }}"
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
                  href="{{ route('payments.index') }}">
                  Back
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>

      @php
        $studentPayments = $student->payments;
      @endphp
      @if (isset($studentPayments))
        @include('payments.student-payments')
      @endif

    </div>
  </div>
</div>
@endsection
