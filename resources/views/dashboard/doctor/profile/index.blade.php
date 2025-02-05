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
        page="Profile"
    />
    <div class="w-full flex items-center justify-between">
        <h1 class="text-[25px] text-primary font-medium">Profile</h1>
        <a href="{{route('dashboard.admin.specialty.create')}}" class="flex items-center gap-2 px-3 py-1 text-white rounded-md">
            <x-button
                text="Edit Profile"
                icon='<i class="fas fa-pen"></i>'
                class="btn-secondarybtn"
            />
        </a>
    </div>

@endsection
