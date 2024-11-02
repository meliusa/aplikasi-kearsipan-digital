@extends('admin.layouts.app')
@section('page-title')
<!--begin::Page title-->
<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
    class="flex-wrap mb-5 page-title d-flex align-items-center me-3 mb-lg-0">
    <!--begin::Title-->
    <h1 class="my-1 d-flex align-items-center text-dark fw-bolder fs-3">Manajer File</h1>
    <!--end::Title-->
    <!--begin::Separator-->
    <span class="mx-4 border-gray-300 h-20px border-start"></span>
    <!--end::Separator-->
    <!--begin::Breadcrumb-->
    <ul class="my-1 breadcrumb breadcrumb-separatorless fw-bold fs-7">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('dashboard.index') }}" class="text-muted text-hover-primary">Home</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bg-gray-300 bullet w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">Manajer File</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
</div>
<!--end::Page title-->
@endsection
@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="pt-6 border-0 card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="my-1 d-flex align-items-center position-relative">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Add user-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                        transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Tambah Dokumen</button>
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->
                    <!--end::Modal - New Card-->
                    <!--begin::Modal - Add task-->
                    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_add_user_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bolder">Add User</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                        data-kt-users-modal-action="close">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                    transform="rotate(45 7.41422 6)" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="mx-5 modal-body scroll-y mx-xl-15 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_modal_add_user_form" class="form" action="#">
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                            id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                            data-kt-scroll-activate="{default: false, lg: true}"
                                            data-kt-scroll-max-height="auto"
                                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                            data-kt-scroll-offset="300px">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="mb-5 d-block fw-bold fs-6">Avatar</label>
                                                <!--end::Label-->
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url(assets/media/avatars/300-6.jpg);">
                                                    </div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar">
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
                                                <label class="mb-2 required fw-bold fs-6">Full Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="user_name"
                                                    class="mb-3 form-control form-control-solid mb-lg-0"
                                                    placeholder="Full name" value="Emma Smith" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="mb-2 required fw-bold fs-6">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="user_email"
                                                    class="mb-3 form-control form-control-solid mb-lg-0"
                                                    placeholder="example@domain.com" value="smith@kpmg.com" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-7">
                                                <!--begin::Label-->
                                                <label class="mb-5 required fw-bold fs-6">Role</label>
                                                <!--end::Label-->
                                                <!--begin::Roles-->
                                                <!--begin::Input row-->
                                                <div class="d-flex fv-row">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="user_role"
                                                            type="radio" value="0" id="kt_modal_update_role_option_0"
                                                            checked='checked' />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label"
                                                            for="kt_modal_update_role_option_0">
                                                            <div class="text-gray-800 fw-bolder">Administrator</div>
                                                            <div class="text-gray-600">Best for business owners and
                                                                company administrators</div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                                <!--end::Input row-->
                                                <div class='my-5 separator separator-dashed'></div>
                                                <!--begin::Input row-->
                                                <div class="d-flex fv-row">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="user_role"
                                                            type="radio" value="1" id="kt_modal_update_role_option_1" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label"
                                                            for="kt_modal_update_role_option_1">
                                                            <div class="text-gray-800 fw-bolder">Developer</div>
                                                            <div class="text-gray-600">Best for developers or people
                                                                primarily using the API</div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                                <!--end::Input row-->
                                                <div class='my-5 separator separator-dashed'></div>
                                                <!--begin::Input row-->
                                                <div class="d-flex fv-row">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="user_role"
                                                            type="radio" value="2" id="kt_modal_update_role_option_2" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label"
                                                            for="kt_modal_update_role_option_2">
                                                            <div class="text-gray-800 fw-bolder">Analyst</div>
                                                            <div class="text-gray-600">Best for people who need full
                                                                access to analytics data, but don't need to update
                                                                business settings</div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                                <!--end::Input row-->
                                                <div class='my-5 separator separator-dashed'></div>
                                                <!--begin::Input row-->
                                                <div class="d-flex fv-row">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="user_role"
                                                            type="radio" value="3" id="kt_modal_update_role_option_3" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label"
                                                            for="kt_modal_update_role_option_3">
                                                            <div class="text-gray-800 fw-bolder">Support</div>
                                                            <div class="text-gray-600">Best for employees who regularly
                                                                refund payments and respond to disputes</div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                                <!--end::Input row-->
                                                <div class='my-5 separator separator-dashed'></div>
                                                <!--begin::Input row-->
                                                <div class="d-flex fv-row">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input me-3" name="user_role"
                                                            type="radio" value="4" id="kt_modal_update_role_option_4" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <label class="form-check-label"
                                                            for="kt_modal_update_role_option_4">
                                                            <div class="text-gray-800 fw-bolder">Trial</div>
                                                            <div class="text-gray-600">Best for people who need to
                                                                preview content data, but don't need to make any updates
                                                            </div>
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
                                            <button type="reset" class="btn btn-light me-3"
                                                data-kt-users-modal-action="cancel">Discard</button>
                                            <button type="submit" class="btn btn-primary"
                                                data-kt-users-modal-action="submit">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
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
            <div class="py-4 card-body">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-30px">No</th>
                            <th class="min-w-125px">Judul</th>
                            <th class="min-w-125px">Deskripsi</th>
                            <th class="min-w-100px">Status</th>
                            <th class="min-w-125px">Terakhir Diperbarui</th>
                            <th class="text-end min-w-100px">Aksi</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        @foreach ($documents as $document)
                        <!--begin::Table row-->
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $document->title }}</td>
                            <td>
                                @if(Str::wordCount($document->description) > 7)
                                {{ Str::words($document->description, 7, ' ...') }}
                                @else
                                {{ $document->description }}
                                @endif
                            </td>
                            @php
                            $colour = "";
                            $result = "";
                            if ($document->status == "public") {
                            $colour = "success";
                            $result = "Publik";
                            } else {
                            $colour = "danger";
                            $result = "Pribadi";
                            }
                            @endphp
                            <td>
                                <div class="badge badge-light-{{ $colour }} fw-bolder">{{ $result }}</div>
                            </td>
                            <td>{{ $document->updated_at->format('d-m-Y H:i') }}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="m-0 svg-icon svg-icon-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                                <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <a href="../../demo1/dist/apps/user-management/users/view.html"
                                            class="px-3 menu-link">Unduh</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <a href="../../demo1/dist/apps/user-management/users/view.html"
                                            class="px-3 menu-link">Ubah</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <a href="#" class="px-3 menu-link"
                                            data-kt-users-table-filter="delete_row">Hapus</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::Action=-->
                        </tr>
                        <!--end::Table row-->
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection
@section('custom-js')
<script>
    "use strict";

    var KTUsersList = function () {
        // Define shared variables
        var table = document.getElementById('kt_table_users');
        var datatable;

        // Private functions
        var initUserTable = function () {
            // Set date data order
            const tableRows = table.querySelectorAll('tbody tr');

            // Init datatable --- more info on datatables: https://datatables.net/manual/
            datatable = $(table).DataTable({
                "info": false,
                'order': [],
                "pageLength": 10,
                "lengthChange": false,
                'columnDefs': [{
                        orderable: false,
                        targets: 5
                    }, // Disable ordering on column 6 (actions)                
                ]
            });

            // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
            datatable.on('draw', function () {
                toggleToolbars();
            });
        }

        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
        var handleSearchDatatable = () => {
            const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        return {
            // Public functions  
            init: function () {
                if (!table) {
                    return;
                }

                initUserTable();
                handleSearchDatatable();

            }
        }
    }();

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTUsersList.init();
    });

</script>
@endsection
