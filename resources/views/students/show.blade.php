@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Detail Student</div>

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

          <form method="POST" action="#">
            @csrf

            <div class="form-group row">
              <label for="nisn" class="col-md-4 col-form-label text-md-right">
                NISN
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('nisn') is-invalid @enderror"
                  id="nisn"
                  name="nisn"
                  value="{{ old('nisn', $student->user->username) }}"
                  required>

                @error('nisn')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="nis" class="col-md-4 col-form-label text-md-right">
                NIS
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('nis') is-invalid @enderror"
                  id="nis"
                  name="nis"
                  value="{{ old('nis', $student->code) }}"
                  required>

                @error('nis')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <hr>

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
                  value="{{ old('name', $student->user->name) }}"
                  required>

                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">
                Email
              </label>
              <div class="col-md-6">
                <input
                  type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  value="{{ old('email', $student->user->email) }}"
                  required>

                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">
                Password
              </label>
              <div class="col-md-6">
                <input
                  type="password"
                  class="form-control @error('password') is-invalid @enderror"
                  id="password"
                  name="password"
                  >

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <hr>

            <div class="form-group row">
              <label for="class" class="col-md-4 col-form-label text-md-right">
                Class
              </label>
              <div class="col-md-6">
                <select
                  name="class"
                  id="class"
                  class="form-control"
                  required>
                  <option value="">Please Select</option>
                  @foreach ($dropdown['classes'] as $classId => $className)
                    <option value="{{ $classId }}"
                      {{ old('class', $student->student_class_id) == $classId ? 'selected' : '' }}>
                      {{ $className }}
                    </option>
                  @endforeach
                </select>

                @error('class')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="spp" class="col-md-4 col-form-label text-md-right">
                Spp
              </label>
              <div class="col-md-6">
                <select
                  name="spp"
                  id="spp"
                  class="form-control"
                  required>
                  <option value="">Please Select</option>
                  @foreach ($dropdown['spp'] as $sppId => $sppYear)
                    <option value="{{ $sppId }}"
                      {{ old('spp', $student->student_spp_id) == $sppId ? 'selected' : '' }}>
                      {{ $sppYear }}
                    </option>
                  @endforeach
                </select>

                @error('spp')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <hr>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                Phone
              </label>
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control @error('phone') is-invalid @enderror"
                  id="phone"
                  name="phone"
                  value="{{ old('phone', $student->phone) }}"
                  required>

                @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                Address
              </label>
              <div class="col-md-6">
                <textarea
                  name="address"
                  id="address"
                  class="form-control @error('address') is-invalid @enderror"
                  rows="3"
                  required>{{ old('address', $student->address) }}</textarea>

                @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <a class="btn btn-outline-secondary"
                  href="{{ route('students.index') }}">
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
