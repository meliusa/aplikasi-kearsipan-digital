@extends('admin.layouts.app')
@section('page-title')
<!--begin::Page title-->
<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
    class="flex-wrap mb-5 page-title d-flex align-items-center me-3 mb-lg-0">
    <!--begin::Title-->
    <h1 class="my-1 d-flex align-items-center text-dark fw-bolder fs-3">Manajemen Dokumen</h1>
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
        <li class="breadcrumb-item text-dark">Manajemen Dokumen</li>
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
                                    <form id="kt_modal_add_user_form" class="form"
                                        action="{{ route('documents.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
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
                                                <label class="mb-2 required fw-bold fs-6">Judul</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="title"
                                                    class="mb-3 form-control form-control-solid mb-lg-0"
                                                    placeholder="Judul" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="mb-2 required fw-bold fs-6">Deskripsi</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea name="description"
                                                    class="form-control form-control-solid mb-lg-0" rows="5"
                                                    placeholder="Deskripsi ..."></textarea>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-7">
                                                <!--begin::Label-->
                                                <label class="mb-5 required fw-bold fs-6">Status</label>
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
                                                            <div class="text-gray-800 fw-bolder">Private</div>
                                                            <div class="text-gray-600">Hanya dapat dilihat oleh Anda.
                                                            </div>
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
                                                            <div class="text-gray-800 fw-bolder">Public</div>
                                                            <div class="text-gray-600">Dapat dilihat oleh semua
                                                                pengguna.</div>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                                <!--end::Input row-->
                                                <div class='my-5 separator separator-dashed'></div>
                                                <!--end::Roles-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="mb-2 required fw-bold fs-6">Unggah File</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="file" name="file_path"
                                                        class="mb-3 form-control form-control-solid mb-lg-0" />
                                                    <!--end::Input-->
                                                    <!--begin::Hint-->
                                                    <span class="form-text text-muted">Max file size is 1MB</span>
                                                    <!--end::Hint-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Scroll-->
                                        <!--begin::Actions-->
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
                            $isChecked = $document->status == "public" ? 'checked' : '';
                            @endphp
                            <td>
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" id="flexSwitchChecked"
                                        {{ $isChecked }} />
                                    <label class="form-check-label" for="flexSwitchChecked">
                                        Publik
                                    </label>
                                </div>
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
                                            class="px-3 menu-link" data-bs-toggle="modal" data-bs-target="#kt_modal_1"
                                            onclick="showDocumentDetail({{ $document->id }})">Detail</a>
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
                                        <!-- Hapus Form -->
                                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
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

<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <strong>Judul:</strong>
                    <span id="modal-judul" class="ms-2"></span>
                </div>

                <div class="mb-3">
                    <strong>Deskripsi:</strong>
                    <span id="modal-deskripsi" class="ms-2"></span>
                </div>

                <div class="mb-3">
                    <strong>File:</strong>
                    <span id="modal-file" class="ms-2"></span>
                </div>

                <div class="mb-3">
                    <strong>Status:</strong>
                    <span id="modal-status" class="ms-2"></span>
                </div>

                <div class="mb-3">
                    <strong>Pengguna:</strong>
                    <span id="modal-pengguna" class="ms-2"></span>
                </div>

                <div class="mb-3">
                    <strong>Tanggal Diupload:</strong>
                    <span id="modal-tanggal" class="ms-2"></span>
                </div>

                <div class="mb-3">
                    <strong>Unduh File:</strong>
                    <a href="#" id="modal-unduh-link" target="_blank">Unduh</a>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


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

    function showDocumentDetail(id) {
        // Lakukan permintaan AJAX untuk mengambil data berdasarkan ID
        $.ajax({
            url: '/get-document-detail/' + id, // Endpoint API untuk mengambil detail dokumen
            method: 'GET',
            success: function (response) {
                // Periksa di console untuk memastikan data yang diterima
                console.log(response);

                // Isi data ke dalam modal
                $('#modal-judul').text(response.title);
                $('#modal-deskripsi').text(response.description);
                $('#modal-file').text(response.file_path); // Menampilkan hanya path relatif file
                $('#modal-status').text(response.status);
                $('#modal-tanggal').text(response.created_at);

                // Menampilkan nama pengguna dan email
                if (response.user_name && response.user_email) {
                    $('#modal-pengguna').text(response.user_name + ' - ' + response.user_email);
                } else {
                    $('#modal-pengguna').text('Data Pengguna Tidak Tersedia');
                }

                // Set link unduh dengan path relatif yang benar
                $('#modal-unduh-link').attr('href', '/storage/' + response
                    .file_path); // Menggunakan /storage/ di sini
                $('#modal-unduh-link').text('Unduh ' + response
                    .title); // Ubah teks tombol unduh sesuai judul dokumen

                // Tampilkan modal
                $('#kt_modal_1').modal('show');
            },
            error: function (xhr, status, error) {
                console.log('AJAX Error:', error); // Menampilkan pesan error di console
                alert('Error fetching data');
            }
        });
    }

</script>
@endsection
