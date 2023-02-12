@extends('layouts.auth')
@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

          <form  action="{{ route('login-user') }}" method="POST">
            @csrf
            <div class="d-flex align-items-center mb-3 pb-1">
                <span class="h1 fw-bold mb-0">User Management App</span>
            </div>
            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <!-- Email input -->
            <div class="form-outline mb-3">
              <input type="email" name="email" id="emailForm" class="form-control form-control-lg"
                placeholder="Enter a valid email address" value="{{ old('email') }}" />
              <label class="form-label" for="emailForm">Email address</label>
            </div>
            <span class="text-danger mb-3">@error('email'){{ '* '.$message }}@enderror</span><br>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" name="password" id="passForm" class="form-control form-control-lg"
                placeholder="Enter password" />
              <label class="form-label" for="passForm">Password</label>
            </div>
            <span class="text-danger mb-3">@error('password'){{ '* '.$message }}@enderror</span><br>

            <button type="submit" class="btn btn-primary btn-lg text-center text-lg-start mt-4 pt-2" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
          </form>
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Copyright &copy; {{ date('Y') }}. All rights reserved.
      </div>
      <!-- Copyright -->
    </div>
</section>
@endsection
