@extends('layout.index')
@section('title', 'Doctor')

@section('content')
    <x-home.hero_section
        route="Doctors"
        text="Our Medical Crew"
        :bg="$bg"
    />

    <main class="w-full">
        <x-doctor.search_section
            :specialties="$specialties"
        />

        {{-- Doctors display section --}}
        <section class="container py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4  gap-6">
            @forelse ($doctors as $doctor)
                <x-doctor.doctor_card
                    :doctor="$doctor"
                />
            @empty
                <div class="w-full col-span-5 h-[100px] flex items-center justify-center text-secondary">
                    No Doctors Found
                </div>
            @endforelse
        </section>
    </main>
@endsection

{{-- Script for handling the search from algo --}}
@push('scripts')
    <script type="text/javascript" src="{{asset('js/doctor/search.js')}}" defer></script>
@endpush
