@extends('layouts.main')
@section('usermanagement-nav','here show menu-here-bg')
@section('main-user','here show')
@section('role-click','here show')
@section('role-list','active')
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Role List</h1>
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
                        <li class="breadcrumb-item text-muted">Role List</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Edit Role</li>
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
                    @if (Session::get('loginId') == 1)
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header pt-6">
                            <h3>Role Edit</h3>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::form-->
                            <form action="{{ route('role-update',$role) }}" method="POST">
                                @csrf
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Role Name</label>
                                    <input type="text" value="{{ old('role',$role->name) }}" name="role" class="form-control form-control-solid mb-3 mb-lg-0" />
                                    <span class="text-danger">@error('role'){{ '* '.$message }} @enderror</span>
                                </div>
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Permissions</label>
                                    <div class="form-group">
                                        @foreach ($permissions as $permission)
                                            <input id="forlabel{{ $permission->id }}" type="checkbox" name="permissions[]" class="" value="{{ $permission->id }}"
                                            @foreach ($role->permissions as $roleper)
                                                @if ($roleper->name == $permission->name)
                                                checked
                                                @endif
                                            @endforeach
                                            />
                                            <label for="forlabel{{ $permission->id }}">{{ $permission->name }}</label><br>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="text-center pt-15">
                                    <a href="{{ route('role-list') }}" class="btn btn-light me-3" >Back</a>
                                    <button type="submit" class="btn btn-success" data-kt-users-modal-action="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-danger text-center">Don't permission to Edit User.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
