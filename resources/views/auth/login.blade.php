@extends('auth.layouts.app')
@section('content')
<!--begin::Content-->
<div class="p-10 d-flex flex-center flex-column flex-column-fluid pb-lg-20">
    <!--begin::Logo-->
    <a href="#" class="mb-12">
        <img alt="Logo" src="assets/media/logos/sd.webp" class="h-100px" />
    </a>
    <!--end::Logo-->
    <!--begin::Wrapper-->
    <div class="p-10 mx-auto rounded shadow-sm w-lg-500px bg-body p-lg-15">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}"
            method="POST">
            @csrf
            <!--begin::Heading-->
            <div class="mb-10 text-center">
                <!--begin::Title-->
                <h1 class="mb-3 text-dark">Login ke Aplikasi Kearsipan Digital di SD Negeri 010 Sagulung</h1>
                <!--end::Title-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                    autocomplete="off" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Wrapper-->
                <div class="mb-2 d-flex flex-stack">
                    <!--begin::Label-->
                    <label class="mb-0 form-label fw-bolder text-dark fs-6">Kata Sandi</label>
                    <!--end::Label-->
                    <!--begin::Link-->
                    <a href="#" class="link-primary fs-6 fw-bolder" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_1">Lupa Kata Sandi?</a>
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                    autocomplete="off" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
                <!--begin::Submit button-->
                <button type="submit" id="kt_sign_in_submit" class="mb-5 btn btn-lg btn-primary w-100">
                    <span class="indicator-label">Login</span>
                    <span class="indicator-progress">Mohon tunggu...
                        <span class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
                </button>
                <!--end::Submit button-->
            </div>
            <!--end::Actions-->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Content-->
@endsection
@section('custom-js')
<script>
    "strict";

    var KTSigninGeneral = function () {
        var form;
        var submitButton;
        var validator;

        var handleForm = function (e) {
            // Init form validation rules.
            validator = FormValidation.formValidation(
                form, {
                    fields: {
                        'email': {
                            validators: {
                                notEmpty: {
                                    message: 'Alamat email wajib diisi'
                                },
                                emailAddress: {
                                    message: 'Alamat email tidak valid'
                                }
                            }
                        },
                        'password': {
                            validators: {
                                notEmpty: {
                                    message: 'Kata sandi wajib diisi'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row'
                        })
                    }
                });

            // Handle form submit
            submitButton.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent default form submission

                // Validate form
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on'); // Loading
                        submitButton.disabled = true;

                        // Collect form data
                        var formData = new FormData(form);

                        // Send AJAX request to server
                        fetch("{{ route('login') }}", {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                submitButton.removeAttribute(
                                    'data-kt-indicator'); // Hide loading
                                submitButton.disabled = false;

                                if (data.status === 'success') {
                                    Swal.fire({
                                        text: data.message,
                                        icon: 'success',
                                        confirmButtonText: "Baik, dimengerti!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function () {
                                        window.location.href =
                                            "{{ route('dashboard.index') }}"; // Redirect setelah login berhasil
                                    });
                                } else {
                                    Swal.fire({
                                        text: data.message,
                                        icon: 'error',
                                        confirmButtonText: "Baik, dimengerti!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire({
                                    text: "Terjadi kesalahan. Silakan coba lagi.",
                                    icon: 'error',
                                    confirmButtonText: "Baik, dimengerti!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            });
                    } else {
                        Swal.fire({
                            text: "Maaf, sepertinya terdapat beberapa kesalahan. Silakan coba lagi.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Baik, dimengerti!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            });
        };

        return {
            init: function () {
                form = document.querySelector('#kt_sign_in_form');
                submitButton = document.querySelector('#kt_sign_in_submit');
                handleForm();
            }
        };
    }();

    KTUtil.onDOMContentLoaded(function () {
        KTSigninGeneral.init();
    });

</script>
@endsection
@include('auth.forgot-password')
