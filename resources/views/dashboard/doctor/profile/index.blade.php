@extends('layout.dashboard')

@section('content')
@push('styles')
    <style>
        .name-cell svg{
            width: 30px;
            height: 30px;
            fill: #5397fdba;
        }
        table > tbody > tr > td{
            padding: 7px 0;
        }
    </style>
@endpush

<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url index='doctor'
        page="Profile"
    />
    <div class="w-full flex items-center justify-between">
        <h1 class="text-[25px] text-primary font-medium">Profile</h1>
        <a href="{{route('dashboard.doctor.profile.edit', $doctor)}}" class="flex items-center gap-2 px-3 py-1 text-white rounded-md">
            <x-button
                text="Edit Profile"
                icon='<i class="fas fa-pen"></i>'
                class="btn-secondarybtn"
            />
        </a>
    </div>

    <main class="w-full h-full flex flex-col gap-4">

        {{-- initial profile section --}}
        <section class="w-full">
            <h2 class="text-sm text-primary font-semibold py-2">Personal Information</h2>
            <section class="w-full flex flex-col md:flex-row divide-x-2 bg-white p-2">
                <div class="w-1/2 flexible flex-col md:flex-row ">
                    <img src="{{asset('storage/'.$doctor->user->profile_image)}}" class="size-[200px] object-cover object-center" alt="service image">
                    <div class="flex flex-col">
                        <h2 class="text-xl font-semibold mb-2">Dr. {{$doctor->user->name}}</h2>
                        <p class="text-sm text-secondary font-normal">{{$doctor->specialty->noun}}</p>
                    </div>
                </div>
                <div class="w-1/2 p-4">
                    <x-dashboard.doctor.profile_table
                        :doctor="$doctor"
                        :age="$age"
                        :contacts="$contacts"
                    />
                </div>
            </section>
        </section>

        {{-- Section for career xtics --}}
        <section class="w-full">
            <h2 class="text-sm text-primary font-semibold py-2">Career Traits</h2>

            <div class="w-full bg-white p-2">
                {{-- table 2 --}}
                <x-dashboard.doctor.profile_table_2
                    :doctor="$doctor"
                />
            </div>
        </section>

        {{-- Section for career xtics --}}
        <section class="w-full">
            <h2 class="text-sm text-primary font-semibold py-2">Job POV</h2>

            <div class="w-full bg-white p-2">
                {{-- Description --}}

                <span class="text-accent">
                    <i class="fas fa-quote-left"></i>
                </span>
                <p class="text-sm text-secondary font-normal md:w-[60%]">{{$doctor->descriptions}}</p>
                <span class="text-accent">
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
        </section>

        <a href="{{route('dashboard.doctor.profile.delete', $doctor)}}" class="flex items-center gap-2 py-1 text-white rounded-md">
            <x-button
                text="Delete Account"
                icon='<i class="fas fa-trash"></i>'
                class="btn-secondarybtn bg-warning"
            />
        </a>
    </main>
@endsection
