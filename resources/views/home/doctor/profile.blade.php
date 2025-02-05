@extends('layout.index')
@section('title', 'Home')

@section('content')

    <style>
        table > tbody > tr > td{
            padding: 7px 0;
        }
    </style>
    @php
        $name = $doctor->user->name;
        $text = 'Dr. '.$name;
    @endphp
    <x-doctor.hero_section
        :route="$name"
        :text="$text"
        :bg="$bg"
    />

    <main class="w-full">
        {{-- Doctors display section --}}
        <section class="container pt-5 pb-20 flexible justify-center">

            {{-- centralize the contents but not to the full width of the container --}}
            <div class="w-full md:w-[80%] grid grid-cols-1 lg:grid-cols-2 gap-4 align-top">

                {{-- image div --}}
                <div class="w-full h-auto min-h-[300px] max-h-[500px] gap-4">
                    <img src="{{asset('storage/'.$doctor->user->profile_image)}}" class="w-full h-full object-cover object-center" alt="service image">

                    {{-- Description --}}
                    <p class="text-sm text-secondary py-4">{{$doctor->descriptions}}</p>
                </div>

                {{-- Doctor information page --}}
                <div class="flex gap-3 items-start flex-col bg-white h-full w-full px-4">
                    <h2 class="text-3xl font-semibold">Dr. {{$doctor->user->name}}</h2>
                    <p class="text-sm text-primary font-normal">{{$doctor->specialty->noun}}</p>

                    <div class="flexible py-4">
                        <div class="flex flex-col gap-2">
                            <span class="text-base text-accent">
                                <i class="fas fa-bolt"></i>
                            </span>
                            <h2 class="text-secondary"> <span class="text-xl font-semibold text-primary">{{$doctor->experience}} </span> yrs</h2>
                            <p class="text-secondary text-xs">Experience</p>
                        </div>
                        <hr class="w-[1px] h-full bg-accent">
                        <div class="flex flex-col gap-2">
                            <span class="text-base text-accent">
                                <i class="fas fa-money-bill-1-wave"></i>
                            </span>
                            <h2 class="text-secondary"> <span class="text-xl font-semibold text-primary">{{(int)$doctor->consultation_fee}} </span> CFA</h2>
                            <p class="text-secondary text-xs">Consulatin Fee</p>
                        </div>

                        <hr class="w-[1px] h-full bg-accent">
                        <div class="flex flex-col gap-2">
                            <span class="text-base text-accent">
                                <i class="fas fa-hospital-user"></i>
                            </span>
                            <h2 class="text-secondary"> <span class="text-xl font-semibold text-primary">{{count($doctor->consultations)}} </span> CFA</h2>
                            <ns class="text-secondary text-xs">DrogCine consultations</ns>
                        </div>
                    </div>

                    {{-- Table like --}}
                    <x-doctor.profile_table
                        :age="$age"
                        :contacts="$contacts"
                        :doctor="$doctor"
                    />
                    {{-- Button to book an appointment --}}
                    <a href="" class="flex items-center gap-1 border border-line_clr w-full mt-[10px]">
                        <x-button
                            text="Book Appointment"
                            class="text-sm font-semibold text-secondary px-4 py-2 min-w-full min-h-fit hover:bg-accent hover:text-white"
                        >
                            <i class="fas fa-chevron-right"></i>
                        </x-button>
                    </a>
                </div>
            </div>

        </section>
    </main>
@endsection

{{-- Script for handling the search from algo --}}
@push('scripts')
    <script type="text/javascript" src="{{asset('js/doctor/search.js')}}" defer></script>
@endpush
