@extends('layout.index')
@section('title', 'Home')

@section('content')
    {{--hero section  --}}
    <x-home.hero :bg="$hero_bg"/>  

    {{-- How it works section --}}
    <x-home.steps />
    {{-- symptoms --}}
    <x-home.symptoms
        :symptoms="$symptoms"
    />
    {{-- Services Rendered --}}
    <x-home.services
        :services="$services"
    />
    {{-- Specialties section --}}
    <x-home.specialty 
        :specialties="$specialties"
    />
    {{-- Doctors link --}}
    <x-home.doctor_link />

    {{-- Testimonials --}}

    {{-- Q and A --}}
    <x-home.q_and_as
        :qs="$q_and_as"
    />
@endsection
