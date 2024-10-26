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
                <h1 class="mb-3 text-dark">Masuk Ke Aplikasi Kearsipan Digital Pada SD Negeri 010 Sagulung</h1>
                <!--end::Title-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">Surel (Email)</label>
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
                    <a href="#"
                        class="link-primary fs-6 fw-bolder">Lupa Kata Sandi ?</a>
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
                    <span class="indicator-label">Masuk</span>
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
