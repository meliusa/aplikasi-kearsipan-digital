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
        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
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
        </form>
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Content-->
@endsection
@section('custom-js')
<script>
    "use strict";

    // Class definition
    var KTSigninGeneral = function () {
        // Elements
        var form;
        var submitButton;
        var validator;

        // Handle form
        var handleForm = function (e) {
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validator = FormValidation.formValidation(
                form, {
                    fields: {
                        'email': {
                            validators: {
                                notEmpty: {
                                    message: 'Alamat email wajib diisi'
                                },
                                emailAddress: {
                                    message: 'Nilai yang dimasukkan bukan alamat email yang valid'
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
                }
            );

            // Handle form submit
            submitButton.addEventListener('click', function (e) {
                // Prevent button default action
                e.preventDefault();

                // Validate form
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click 
                        submitButton.disabled = true;


                        // Simulate ajax request
                        setTimeout(function () {
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;

                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Anda berhasil masuk!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Baik, dimengerti!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    form.querySelector('[name="email"]').value =
                                        "";
                                    form.querySelector('[name="password"]')
                                        .value = "";
                                    //form.submit(); // submit form
                                }
                            });
                        }, 2000);
                    } else {
                        // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
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
        }

        // Public functions
        return {
            // Initialization
            init: function () {
                form = document.querySelector('#kt_sign_in_form');
                submitButton = document.querySelector('#kt_sign_in_submit');

                handleForm();
            }
        };
    }();

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTSigninGeneral.init();
    });

</script>
@endsection
@include('auth.forgot-password')
