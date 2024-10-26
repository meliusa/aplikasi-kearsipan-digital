@extends('admin.layouts.app')
@section('page-title')
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="flex-wrap mb-5 page-title d-flex align-items-center me-3 mb-lg-0">
            <!--begin::Title-->
            <h1 class="my-1 d-flex align-items-center text-dark fw-bolder fs-3">
                Dashboard
                <!--begin::Separator-->
                <span class="mx-2 border-gray-200 h-20px border-start ms-3"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="my-1 text-muted fs-7 fw-bold ms-1">#XRS-45670</small>
                <!--end::Description-->
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
@endsection
@section('content')
ini dashboard
@endsection
