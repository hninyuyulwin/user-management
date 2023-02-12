@extends('layouts.main')
@section('usermanagement-nav','here show menu-here-bg')
@section('user-list','active')
@section('main-user','here show')
@section('user-click','here show')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Users List</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('home') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">User Management</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">User List</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Edit User</li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="col-md-8 offset-md-2">
                    @if (Session::get('loginId') == 1 || Session::get('loginId') == $user->id)
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header pt-6">
                            <h3>User Edit</h3>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::form-->
                            <form action="{{ route('user-update',$user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                    <input type="text" value="{{ old('name',$user->name) }}" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                                    <span class="text-danger">@error('name'){{ '* '.$message }} @enderror</span>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Username</label>
                                    <span class="text-muted">Username must be unique</span>
                                    <input type="text" value="{{ old('username',$user->username) }}" name="username" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Username" />
                                    <span class="text-danger">@error('username'){{ '* '.$message }} @enderror</span>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Email</label>
                                    <input type="email" value="{{ old('email',$user->email) }}" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com"/>
                                    <span class="text-danger">@error('email'){{ '* '.$message }} @enderror</span>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Phone</label>
                                    <input type="number" value="{{ old('phone',$user->phone) }}" name="phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="09xxxxxxxxx"/>
                                    <span class="text-danger">@error('phone'){{ '* '.$message }} @enderror</span>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Role</label>
                                    <select name="role_id" class="form-control form-control-solid mb-3 mb-lg-0">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $user->role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('role_id'){{ '* '.$message }} @enderror</span>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Password</label>
                                    <span class="text-muted">Can leave empty if you don't want to update password</span>
                                    <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" />
                                    <span class="text-danger">@error('password'){{ '* '.$message }} @enderror</span>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control form-control-solid mb-3 mb-lg-0" />
                                    <span class="text-danger">@error('cpassword'){{ '* '.$message }} @enderror</span>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Gender</label><br>
                                    <div class="form-check form-check-inline" >
                                        <input class="form-check-input" id="male" type="radio" name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="female" type="radio" name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div><br>
                                    <span class="text-danger">@error('gender'){{ '* '.$message }} @enderror</span>
                                </div>

                                <div class="text-center pt-15">
                                    <a href="{{ route('user-list') }}" class="btn btn-light me-3" >Back</a>
                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">Edit User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-danger text-center">Don't have permission to Edit user.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
