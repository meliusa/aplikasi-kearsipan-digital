@extends('admin.layouts.app')
@section('page-title')
<!--begin::Page title-->
<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
    class="flex-wrap mb-5 page-title d-flex align-items-center me-3 mb-lg-0">
    <!--begin::Title-->
    <h1 class="my-1 d-flex align-items-center text-dark fw-bolder fs-3">Manajemen Pengguna</h1>
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
        <li class="breadcrumb-item text-dark">Manajemen Pengguna</li>
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
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
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
                            class="form-control form-control-solid w-250px ps-14" placeholder="Cari" />
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
                            <!--end::Svg Icon-->Tambah Data</button>
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
                                    <h2 class="fw-bolder">Tambah Data</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                        data-kt-users-modal-action="close" id="closeModalButton">
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
                                    <form id="kt_modal_add_user_form" class="form" action="{{ route('users.store') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                            id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                            data-kt-scroll-activate="{default: false, lg: true}"
                                            data-kt-scroll-max-height="auto"
                                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                            data-kt-scroll-offset="300px">

                                            <!-- Foto -->
                                            <div class="fv-row mb-7">
                                                <label class="mb-5 d-block fw-bold fs-6">Foto</label>
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                    </div>
                                                    <label
                                                        class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg"
                                                            onchange="handleFileChange(this)" />
                                                        <input type="hidden" name="avatar_remove" />
                                                    </label>
                                                    <span id="cancelButton"
                                                        class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar" style="display: none;">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <span id="removeButton"
                                                        class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Remove avatar" style="display: none;">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            </div>

                                            <!-- Nama Lengkap -->
                                            <div class="fv-row mb-7">
                                                <label class="mb-2 required fw-bold fs-6">Nama Lengkap</label>
                                                <input type="text" name="name"
                                                    class="mb-3 form-control form-control-solid mb-lg-0"
                                                    placeholder="Nama Lengkap" />
                                            </div>

                                            <!-- Surel -->
                                            <div class="fv-row mb-7">
                                                <label class="mb-2 required fw-bold fs-6">Surel (Email)</label>
                                                <input type="email" name="email"
                                                    class="mb-3 form-control form-control-solid mb-lg-0"
                                                    placeholder="contoh@domain.com" />
                                            </div>

                                            <!-- Kata Sandi -->
                                            <div class="fv-row mb-7">
                                                <label class="mb-2 required fw-bold fs-6">Kata Sandi</label>
                                                <input type="password" name="password"
                                                    class="mb-3 form-control form-control-solid mb-lg-0"
                                                    placeholder="**********" />
                                            </div>

                                            <!-- Role -->
                                            <div class="fv-row mb-7">
                                                <label class="mb-2 required fw-bold fs-6">Role</label>
                                                <div class="d-flex">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="role"
                                                            value="admin" checked />
                                                        <span class="form-check-label">Admin</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="role"
                                                            value="staf" />
                                                        <span class="form-check-label">Staf</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="text-center pt-15">
                                            <button type="reset" class="btn btn-light me-3"
                                                data-kt-users-modal-action="cancel">Batal</button>
                                            <button type="submit" class="btn btn-primary"
                                                data-kt-users-modal-action="submit">
                                                <span class="indicator-label">Simpan</span>
                                                <span class="indicator-progress">Mohon tunggu...
                                                    <span
                                                        class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
                                            </button>
                                        </div>
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
                            <th class="min-w-125px">Pengguna</th>
                            <th class="min-w-100px">Peran</th>
                            <th class="min-w-100px">Status</th>
                            <th class="min-w-125px">Terakhir Diperbarui</th>
                            <th class="text-end min-w-100px">Aksi</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        @foreach ($users as $user)
                        <!--begin::Table row-->
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="d-flex align-items-center">
                                <!--begin:: Avatar -->
                                <div class="overflow-hidden symbol symbol-circle symbol-50px me-3">
                                    <a href="../../demo1/dist/apps/user-management/users/view.html">
                                        <div class="symbol-label">
                                            {{-- <img src="assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" /> --}}
                                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto"
                                                class="w-100" />
                                        </div>
                                    </a>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div class="d-flex flex-column">
                                    <a href="../../demo1/dist/apps/user-management/users/view.html"
                                        class="mb-1 text-gray-800 text-hover-primary">{{ $user->name }}</a>
                                    <span>{{ $user->email }}</span>
                                </div>
                                <!--begin::User details-->
                            </td>
                            @php
                            $result = "";
                            if($user->role == "admin"){
                            $result = "Admin";
                            }
                            elseif($user->role == "staf"){
                            $result = "Staf";
                            }
                            @endphp
                            <td>{{ $result }}</td>
                            @php
                            $isChecked = $user->is_active == 1 ? 'checked' : '';
                            @endphp
                            <td>
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $user->id }}"
                                        id="flexSwitchChecked-{{ $user->id }}" {{ $isChecked }}
                                        data-id="{{ $user->id }}" />
                                    <label class="form-check-label" for="flexSwitchChecked-{{ $user->id }}">
                                        Aktif
                                    </label>
                                </div>
                            </td>
                            <td>{{ $user->updated_at->format('d-m-Y H:i') }}</td>
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
                                        <button class="px-3 menu-link btn btn-sm user-update"
                                            data-user-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                            data-email="{{ $user->email }}"
                                            data-photo="{{ asset('storage/' . $user->photo) }}"
                                            data-role="{{ $user->role }}" data-kt-users-modal-action="edit">
                                            Ubah
                                        </button>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="px-3 menu-item">
                                        <!-- Hapus Form -->
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 menu-link btn btn-sm">Hapus</button>
                                        </form>
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

<div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_edit_user_header">
                <h2 class="fw-bolder">Ubah Data</h2>
                <!-- Close Button -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="kt_modal_edit_user_form" action="{{ route('users.update', 'user_id') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Foto -->
                    <div class="fv-row mb-7">
                        <label for="current_photo">Foto Saat Ini:</label><br>
                        <img class="mb-2 rounded img-fluid" id="current-photo" height="120" width="120"
                            alt="Foto Saat Ini" />
                        <div class="form-floating">
                            <input type="file" id="photo" name="photo" class="form-control" />
                            <label for="photo">Unggah Foto Baru</label>
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="fv-row mb-7">
                        <label class="mb-2 required fw-bold fs-6">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="mb-3 form-control form-control-solid mb-lg-0"
                            placeholder="Nama Lengkap" />
                    </div>

                    <!-- Surel -->
                    <div class="fv-row mb-7">
                        <label class="mb-2 required fw-bold fs-6">Surel (Email)</label>
                        <input type="email" name="email" id="email" class="mb-3 form-control form-control-solid mb-lg-0"
                            placeholder="contoh@domain.com" />
                    </div>

                    <!-- Kata Sandi -->
                    <div class="fv-row mb-7">
                        <label class="mb-2 required fw-bold fs-6">Kata Sandi</label>
                        <input type="password" name="password" class="mb-3 form-control form-control-solid mb-lg-0"
                            placeholder="**********" />
                    </div>

                    <!-- Role -->
                    <div class="fv-row mb-7">
                        <label class="mb-2 required fw-bold fs-6">Role</label>
                        <div class="d-flex">
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" value="admin"
                                    id="role-admin" />
                                <span class="form-check-label">Admin</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" value="staf" id="role-staf" />
                                <span class="form-check-label">Staf</span>
                            </label>
                        </div>
                    </div>

                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-light me-3" id="kt_modal_edit_user_reset">Batal</button>
                        <button type="submit" class="btn btn-warning">
                            <span class="indicator-label">Ubah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var csrfToken = "{{ csrf_token() }}";

</script>
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
            const tableRows = table.querySelectorAll('tbody tr');

            datatable = $(table).DataTable({
                "info": false,
                'order': [],
                "pageLength": 10,
                "lengthChange": false,
                'columnDefs': [{
                    orderable: false,
                    targets: 5
                }]
            });

            datatable.on('draw', function () {
                toggleToolbars();
            });
        }

        var handleSearchDatatable = () => {
            const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }

        return {
            init: function () {
                if (!table) {
                    return;
                }

                initUserTable();
                handleSearchDatatable();
            }
        }
    }();

    KTUtil.onDOMContentLoaded(function () {
        KTUsersList.init();

        // Add event listener for the close button
        document.getElementById('closeModalButton').addEventListener('click', function () {
            var modal = this.closest('.modal');
            if (modal) {
                $(modal).modal('hide'); // Hide the modal using Bootstrap's modal method
            }
        });
    });

    // Reset form fields when the "Cancel" button is clicked
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function () {
            const form = this.querySelector('form');
            if (form) {
                form.reset();
            }
        });
    });

    function handleFileChange(input) {
        const wrapper = document.querySelector('.image-input-wrapper');
        const cancelButton = document.getElementById('cancelButton');
        const removeButton = document.getElementById('removeButton');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // Update the image preview
                wrapper.style.backgroundImage = `url(${e.target.result})`;
                // Show the cancel and remove buttons
                cancelButton.style.display = 'inline-block';
                removeButton.style.display = 'inline-block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            // Reset to blank image and hide buttons if no file is selected
            wrapper.style.backgroundImage = "url('assets/media/svg/avatars/blank.svg')";
            cancelButton.style.display = 'none';
            removeButton.style.display = 'none';
        }
    }

    $(document).ready(function () {
        // Menyimpan nilai asli dari form sebelum modal dibuka
        let originalFormData = {};

        // Ketika tombol edit diklik
        $('.user-update').click(function (e) {
            e.preventDefault();

            // Ambil data dari tombol yang diklik
            const userId = $(this).data('user-id');
            const name = $(this).data('name');
            const email = $(this).data('email');
            const photo = $(this).data('photo');
            const role = $(this).data('role');

            // Simpan data asli ke dalam object originalFormData
            originalFormData = {
                userId: userId,
                name: name,
                email: email,
                photo: photo,
                role: role
            };

            // Set data ke dalam modal
            $('#kt_modal_edit_user').find('#name').val(name);
            $('#kt_modal_edit_user').find('#email').val(email);
            $('#kt_modal_edit_user').find('#current-photo').attr('src', photo);
            $('#kt_modal_edit_user').find('#role-' + role).prop('checked', true);

            // Set action URL untuk form
            $('#kt_modal_edit_user_form').attr('action', '/users/' + userId);

            // Tampilkan modal
            $('#kt_modal_edit_user').modal('show');
        });

        // Ketika tombol Batal diklik, reset form ke nilai asli
        $('#kt_modal_edit_user_reset').click(function () {
            // Reset input values ke data asli
            $('#kt_modal_edit_user').find('#name').val(originalFormData.name);
            $('#kt_modal_edit_user').find('#email').val(originalFormData.email);
            $('#kt_modal_edit_user').find('#current-photo').attr('src', originalFormData.photo);
            $('#kt_modal_edit_user').find('#role-' + originalFormData.role).prop('checked', true);

            // Tidak menutup modal
            $('#kt_modal_edit_user').modal('show');
        });
    });

    $(document).ready(function () {
        $('input[type="checkbox"][id^="flexSwitchChecked-"]').on('change', function () {
            var userId = $(this).data('id'); // ID user
            var isActive = $(this).prop('checked') ? 1 :
                0; // Tentukan status baru (1: Aktif, 0: Tidak Aktif)

            // Kirim request AJAX untuk mengupdate status is_active
            $.ajax({
                url: '/users/update-status/' + userId, // URL untuk update status
                type: 'POST',
                data: {
                    is_active: isActive, // Status yang baru
                    _token: '{{ csrf_token() }}' // Token CSRF untuk proteksi
                },
                success: function (response) {
                    // Tampilkan pesan sukses jika diperlukan
                    if (response.status === 'success') {
                        console.log(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    // Tangani error jika ada
                    console.error("Error: " + error);
                }
            });
        });
    });

</script>
@endsection
