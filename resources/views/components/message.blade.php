@if(isset($errors))
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger">{{ $error }}</x-alert>
        @endforeach
    @endif
@endif
@if(session('message'))
    <x-alert type="{{ session('status') }}">{{ session('message') }}</x-alert>
@endif

