@extends('layout.index')
@section('title', 'Specialties')

@section('content')
    <x-home.hero_section
        route="Specialties"
        text="Areas of Expertise"
        :bg="$bg"
    />

    <main class="w-full">
        <x-specialty.search_section />

        {{-- Specialties display section --}}

        <section class="container py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @forelse ($specialties as $specialty)
                <x-specialty.specialty_card
                    :specialty="$specialty"
                    description="show"
                />
            @empty
                <div class="w-full col-span-5 h-[100px] flex items-center justify-center text-secondary">
                    There are no Registered Specialties yet                </div>
            @endforelse
        </section>
    </main>
@endsection
