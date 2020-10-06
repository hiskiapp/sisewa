@extends('layout.default')
@section('title', 'Submit Data')
@section('content')
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Submit Data <i class="mr-2"></i>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route('home') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>
                Back to Dashboard
            </a>
            <div class="btn-group">
                <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder">
                    <i class="ki ki-check icon-sm"></i>
                    Submit
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <!--begin::Form-->
        <form class="form" id="kt_form" method="POST" action="{{ route('data.post') }}" enctype="multipart/form-data">
            @csrf

            @if($user->status != 0)
            @method('PATCH')
            @endif
            @include('components.message')
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    <div class="my-5">
                        <h3 class=" text-dark font-weight-bold mb-10">Info Sekolah</h3>
                        <div class="form-group row">
                            <label class="col-3">Icon</label>
                            <div class="col-9">
                                <input class="form-control form-control-solid" type="file" name="icon" {{ optional($user->data)->icon ?? 'required' }} />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Name</label>
                            <div class="col-9">
                                <input class="form-control form-control-solid" type="text" name="name" value="{{ old('name', optional($user->data)->name) }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Email Address</label>
                            <div class="col-9">
                                <div class="input-group input-group-solid">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="la la-at"></i></span></div>
                                    <input type="email" name="email" class="form-control form-control-solid pl-2" value="{{ old('email', optional($user->data)->email) }}" placeholder="Email" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Photo</label>
                            <div class="col-9">
                                <input class="form-control form-control-solid" type="file" name="photo" {{ optional($user->data)->photo ?? 'required' }} />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">URL/Domain</label>
                            <div class="col-9">
                                <div class="input-group input-group-solid">
                                    <input type="text" name="domain" class="form-control form-control-solid" placeholder="URL"
                                        value="{{ old('domain', optional($user->data)->domain) }}" />
                                    <div class="input-group-append"><span class="input-group-text">URL</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2"></div>
            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
@endsection
