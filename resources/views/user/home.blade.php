{{-- Extends layout --}}
@extends('layout.default')

{{-- Title --}}
@section('title', 'Home')

{{-- Content --}}
@section('content')

{{-- Dashboard 1 --}}

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
