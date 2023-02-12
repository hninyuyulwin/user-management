@extends('layouts.main')
@section('usermanagement-nav','here show menu-here-bg')
@section('main-user','here show')
@section('permission-list','active')
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Permission List</h1>
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
                        <li class="breadcrumb-item text-muted">Permission List</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Permission Create</li>
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
                <div class="col-md-6 offset-md-3">
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header pt-6">
                            <h3>Permission Create</h3>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::form-->
                            <form action="{{ route('permission-store') }}" method="POST">
                                @csrf
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Permission Name</label>
                                    <input type="text" value="{{ old('permission') }}" name="permission" class="form-control form-control-solid mb-3 mb-lg-0" />
                                    <span class="text-danger">@error('permission'){{ '* '.$message }} @enderror</span>
                                </div>
                                <div class="fv-row mb-7">
                                    <label id="feature" class="required fw-semibold fs-6 mb-2">Features</label>
                                    <select name="feature_id" class="form-control form-control-solid mb-3 mb-lg-0" id="feature">
                                        <option value="">Select Feature</option>
                                        @foreach ($features as $feature)
                                            <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('feature_id'){{ '* '.$message }} @enderror</span>
                                </div>

                                <div class="text-center pt-15">
                                    <a href="{{ route('permission-list') }}" class="btn btn-light me-3" >Back</a>
                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">Add Permission</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
