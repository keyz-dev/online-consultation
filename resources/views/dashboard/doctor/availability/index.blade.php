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
        page="Availability"
    />
    <div class="w-full flex items-center justify-between">
        <h1 class="text-[25px] text-primary font-medium">Availability</h1>

        {{-- This button is supposed to visible if and only if the day is right for setting (i.e) --}}
        <a href="{{route('dashboard.doctor.availability.set')}}" class="flex items-center gap-2 px-3 py-1 text-white rounded-md">
            <x-button
                text="Set Availability"
                icon='<i class="fas fa-pen"></i>'
                class="btn-secondarybtn"
            />
        </a>
    </div>

    <main class="w-full h-full bg-white p-2 divide-y-2">

    </main>

@endsection
