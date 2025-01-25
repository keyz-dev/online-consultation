@extends('layout.index')
@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="{{asset('font/sofia-pro-webfont/style.css')}}">
@endpush

@section('content')
    {{--hero section  --}}
    <x-home.hero :bg="$hero_bg"/>  

    {{-- How it works section --}}
    <x-home.steps />

    {{-- Specialties section --}}
    <x-home.specialty />

    
@endsection
