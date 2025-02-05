@extends('layout.dashboard')

@section('content')

@push('styles')
    <style>
        .name-cell svg{
            width: 30px;
            height: 30px;
            fill: #5397fdba;
        }
    </style>
@endpush

<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url 
        page="Dashboard"
    />

    <main class="w-full h-full bg-white p-2 divide-y-2">
        
    </main>
</section>
@endsection
