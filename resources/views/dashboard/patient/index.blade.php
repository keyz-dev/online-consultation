@extends('layout.dashboard')

@push('scripts')
    <script type="text/javascript" src="{{asset('js/product.js')}}" defer></script>
@endpush

@section('content')
    <div>
        This is the Patient dashboard
    </div>
@endsection
