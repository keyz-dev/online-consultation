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
    <x-dashboard.page_url index='doctor'
        page="Patients"
    />
    <div class="w-full flex items-center justify-start">
        <h1 class="text-[25px] text-primary font-medium">My Patients</h1>

    </div>

    <main class="w-full h-full bg-white p-2 divide-y-2">
        {{-- Display the patients that have been consulted  by the doctor --}}

    </main>

@endsection
