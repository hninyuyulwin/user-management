@extends('layouts.main')
@section('usermanagement-nav','here show menu-here-bg')
@section('main-user','here show')
@section('role-click','here show')
@section('role-list','active')
@section('content')
    <!--begin::Main-->
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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Roles List</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('home') }}" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">User Management</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Role List</li>
                            <!--end::Item-->
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
                <div id="kt_app_content_container" class="app-container container-xl">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header border-0 pt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title">

                                    </div>
                                    <!--begin::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                            <!--begin::Add user-->
                                            <a href="{{ route('role-create') }}" class="btn btn-primary">
                                            <span class="svg-icon svg-icon-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Role Add
                                            </a>
                                            <!--end::Svg Icon-->
                                            <!--end::Add user-->
                                        </div>
                                        <!--end::Toolbar-->

                                        <!--begin::Modal - Add task-->
                                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header" id="kt_modal_add_user_header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bold">Role Add</h2>
                                                        <!--end::Modal title-->
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-1">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--end::Modal header-->
                                                    <!--begin::Modal body-->
                                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                        <!--begin::Form-->
                                                        <form id="kt_modal_add_user_form" class="form" action="#">
                                                            <!--begin::Scroll-->
                                                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Image placeholder-->
                                                                    <style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
                                                                    <!--end::Image placeholder-->
                                                                    <!--begin::Image input-->
                                                                    <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                                        <!--begin::Preview existing avatar-->
                                                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-6.jpg);"></div>
                                                                        <!--end::Preview existing avatar-->
                                                                        <!--begin::Label-->
                                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                                            <!--begin::Inputs-->
                                                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                            <input type="hidden" name="avatar_remove" />
                                                                            <!--end::Inputs-->
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Cancel-->
                                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                                            <i class="bi bi-x fs-2"></i>
                                                                        </span>
                                                                        <!--end::Cancel-->
                                                                        <!--begin::Remove-->
                                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                                            <i class="bi bi-x fs-2"></i>
                                                                        </span>
                                                                        <!--end::Remove-->
                                                                    </div>
                                                                    <!--end::Image input-->
                                                                    <!--begin::Hint-->
                                                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                                    <!--end::Hint-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="Emma Smith" />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="smith@kpmg.com" />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                                <!--begin::Input group-->
                                                                <div class="mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Roles-->
                                                                    <!--begin::Input row-->
                                                                    <div class="d-flex fv-row">
                                                                        <!--begin::Radio-->
                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                            <!--begin::Input-->
                                                                            <input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked='checked' />
                                                                            <!--end::Input-->
                                                                            <!--begin::Label-->
                                                                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                                                <div class="fw-bold text-gray-800">Administrator</div>
                                                                                <div class="text-gray-600">Best for business owners and company administrators</div>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                        </div>
                                                                        <!--end::Radio-->
                                                                    </div>
                                                                    <!--end::Input row-->
                                                                    <div class='separator separator-dashed my-5'></div>
                                                                    <!--begin::Input row-->
                                                                    <div class="d-flex fv-row">
                                                                        <!--begin::Radio-->
                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                            <!--begin::Input-->
                                                                            <input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1" />
                                                                            <!--end::Input-->
                                                                            <!--begin::Label-->
                                                                            <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                                                <div class="fw-bold text-gray-800">Developer</div>
                                                                                <div class="text-gray-600">Best for developers or people primarily using the API</div>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                        </div>
                                                                        <!--end::Radio-->
                                                                    </div>
                                                                    <!--end::Input row-->
                                                                    <div class='separator separator-dashed my-5'></div>
                                                                    <!--begin::Input row-->
                                                                    <div class="d-flex fv-row">
                                                                        <!--begin::Radio-->
                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                            <!--begin::Input-->
                                                                            <input class="form-check-input me-3" name="user_role" type="radio" value="2" id="kt_modal_update_role_option_2" />
                                                                            <!--end::Input-->
                                                                            <!--begin::Label-->
                                                                            <label class="form-check-label" for="kt_modal_update_role_option_2">
                                                                                <div class="fw-bold text-gray-800">Analyst</div>
                                                                                <div class="text-gray-600">Best for people who need full access to analytics data, but don't need to update business settings</div>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                        </div>
                                                                        <!--end::Radio-->
                                                                    </div>
                                                                    <!--end::Input row-->
                                                                    <div class='separator separator-dashed my-5'></div>
                                                                    <!--begin::Input row-->
                                                                    <div class="d-flex fv-row">
                                                                        <!--begin::Radio-->
                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                            <!--begin::Input-->
                                                                            <input class="form-check-input me-3" name="user_role" type="radio" value="3" id="kt_modal_update_role_option_3" />
                                                                            <!--end::Input-->
                                                                            <!--begin::Label-->
                                                                            <label class="form-check-label" for="kt_modal_update_role_option_3">
                                                                                <div class="fw-bold text-gray-800">Support</div>
                                                                                <div class="text-gray-600">Best for employees who regularly refund payments and respond to disputes</div>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                        </div>
                                                                        <!--end::Radio-->
                                                                    </div>
                                                                    <!--end::Input row-->
                                                                    <div class='separator separator-dashed my-5'></div>
                                                                    <!--begin::Input row-->
                                                                    <div class="d-flex fv-row">
                                                                        <!--begin::Radio-->
                                                                        <div class="form-check form-check-custom form-check-solid">
                                                                            <!--begin::Input-->
                                                                            <input class="form-check-input me-3" name="user_role" type="radio" value="4" id="kt_modal_update_role_option_4" />
                                                                            <!--end::Input-->
                                                                            <!--begin::Label-->
                                                                            <label class="form-check-label" for="kt_modal_update_role_option_4">
                                                                                <div class="fw-bold text-gray-800">Trial</div>
                                                                                <div class="text-gray-600">Best for people who need to preview content data, but don't need to make any updates</div>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                        </div>
                                                                        <!--end::Radio-->
                                                                    </div>
                                                                    <!--end::Input row-->
                                                                    <!--end::Roles-->
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Scroll-->
                                                            <!--begin::Actions-->
                                                            <div class="text-center pt-15">
                                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                                    <span class="indicator-label">Submit</span>
                                                                    <span class="indicator-progress">Please wait...
                                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                </button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </form>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Modal body-->
                                                </div>
                                                <!--end::Modal content-->
                                            </div>
                                            <!--end::Modal dialog-->
                                        </div>
                                        <!--end::Modal - Add task-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-4">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                                    @endif
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-125px">#</th>
                                                <th class="min-w-125px">Roles</th>
                                                @if (Session::get('loginId') == 1)
                                                    <th class="min-w-100px">Actions</th>
                                                @endif
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="text-gray-600 fw-semibold">
                                            <!--begin::Table row-->
                                            @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>
                                            @if (Session::get('loginId') == 1)
                                                <td>
                                                    <a href="{{ route('role-edit',$role) }}" class="badge badge-warning">
                                                        <i class="fa fa-pencil text-white p-2"></i>
                                                    </a>
                                                    <a href="{{ route('role-delete',$role) }}" class="badge badge-danger delete_selected">
                                                        <i class="fa fa-trash text-white p-2"></i>
                                                    </a>
                                                    <a href="{{ route('role-view',$role) }}" class="badge badge-success">
                                                        <i class="fa fa-eye text-white p-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>

                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
@endsection
@push('script-alt')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
     $('.delete_selected').click(function(event) {
        event.preventDefault();
        var urlToRedirect = event.currentTarget.getAttribute('href');
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = urlToRedirect;
        } else {
            swal("Cancled to delete!!!");
        }
        });
    });
</script>
@endpush
