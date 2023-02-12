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
                        <li class="breadcrumb-item text-muted">Role Detail</li>
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
                        <div class="card-header pt-6">
                            <h3>Role Details</h3>
                            <div class="mb-0">
                                <a href="{{ route('role-list') }}" class="btn btn-sm btn-light" >Back</a>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <h4>Role Name : {{ $role->name }}</h4>
                            @foreach ($role->permissions as $permission)
                                <div class="badge badge-success mb-2">{{ $permission->name }}</div><br>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="alert alert-danger text-center">Don't permission to view role.</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
