@extends('layout.default')
@section('title', 'Download File')
@section('content')
@if($user->status == 0)
<div class="alert alert-danger mb-5 p-5" role="alert">
    <h4 class="alert-heading">Mohon Segera Submit Data Anda Gblk!</h4>
    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
    <div class="border-bottom border-white opacity-20 mb-5"></div>
    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>
@elseif($user->data->file == NULL)
<div class="alert alert-warning mb-5 p-5" role="alert">
    <h4 class="alert-heading">Adminnya Kek Kntl, Males Upload Filenya</h4>
    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
    <div class="border-bottom border-white opacity-20 mb-5"></div>
    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>
@else
<!-- begin::Card-->
<div class="card card-custom overflow-hidden">
    <div class="card-body p-0">
        <!-- begin: Invoice-->
        <!-- begin: Invoice header-->
        <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url({{ asset('media/bg/bg-6.jpg') }});">
            <div class="col-md-9">
                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                    <h1 class="display-4 text-white font-weight-boldest mb-10">Download File</h1>
                    <div class="d-flex flex-column align-items-md-end px-0">
                        <!--begin::Logo-->
                        <a href="#" class="mb-5">
                            <img src="{{ asset('media/logos/logo-light.png') }}" alt="" />
                        </a>
                        <!--end::Logo-->
                        <span class="text-white d-flex flex-column align-items-md-end opacity-70">
                            <span>{{ $user->data->name }}</span>
                            <span>{{ $user->data->email }}</span>
                        </span>
                    </div>
                </div>
                <div class="border-bottom w-100 opacity-20"></div>
                <div class="d-flex justify-content-between text-white pt-6">
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolde mb-2r">Tanggal</span>
                        <span class="opacity-70">{{ now()->format('d F Y') }}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">ID NUMBER</span>
                        <span class="opacity-70">#{{ $user->id }}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">URL</span>
                        <span class="opacity-70">{{ $user->data->domain }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('file.download') }}" class="btn btn-primary font-weight-bold">Download File</a>
                </div>
            </div>
        </div>
        <!-- end: Invoice action-->
        <!-- end: Invoice-->
    </div>
</div>
<!-- end::Card-->
@endif
@endsection
