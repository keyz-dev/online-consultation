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
        <a href="{{route('dashboard.admin.specialty.create')}}" class="flex items-center gap-2 px-3 py-1 text-white rounded-md">
            <x-button
                text="Set Availability"
                icon='<i class="fas fa-pen"></i>'
                class="btn-secondarybtn"
            />
        </a>
    </div>

    <main class="w-full h-full bg-white p-2 divide-y-2">
        <div class="grid grid-cols-4 justify-start gap-[6rem]">
            {{-- @foreach($activeDoctors as $doctors)
                <x-dashboard.doctor.available_doctor
                    img_path="./storage/availability_images/ . {{ $doctors['availability'] }}"
                    status="available"
                    name='{{ $doctors["name"] }}'
                    city='{{ $doctors["city"] }}'
                    availability='{{ $doctors["Availability"] }}'
                    nationality='{{ $doctors["nationality"] }}'
                />
            @endforeach --}}
        </div>
    </main>

@endsection
