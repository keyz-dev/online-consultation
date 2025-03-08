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
        page="Set Availability"
    />
    <div class="w-full flex items-center justify-between">
        <h1 class="text-[25px] text-primary font-medium">Set Availability</h1>
    </div>

    <main class="w-full h-full mt-4">

        <form method="POST" class="text-secondary flex flex-col gap-8 w-full md:w-[30%]">
            @csrf
            <div class="flex flex-col gap-2">
                {{-- Days of the week --}}
                <h2 class="text-base font-semibold">Days of the week</h2>
                <div class="flexible flex-wrap">
                    @foreach($days as $day)
                    <div class="flex gap-1 items-center border rounded-sm p-2">
                        <input type="checkbox" name="days[]" value="{{ $day }}" id="{{ strtolower($day) }}">
                        <label for="{{ strtolower($day) }}">{{ $day }}</label><br>
                    </div>
                    @endforeach
                    @error('days')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Consultation duration --}}
            <div class="flex flex-col gap-2">
                {{-- Days of the week --}}
                <h2 class="text-base font-semibold">Consultation Duration</h2>
                <div class="flexible">
                    <label for="duration" class="text-sm">(In minutes):</label>
                    <x-input type="number" name="duration" id="duration"/>
                </div>

            </div>

            <!-- Time Range -->
            <div class="flex flex-col gap-2 w-full">
                {{-- Days of the week --}}
                <h2 class="text-base font-semibold">Time Range</h2>
                <div class="flexible">

                    <div class="w-full">
                        <label class="text-sm" for="start_hour">Start Hour:</label>
                        <x-input type="time"  name="start_hour" id="start_hour" />
                    </div>
                    <div class="w-full">
                        <label class="text-sm" for="end_hour">End Hour:</label>
                        <x-input type="time"  name="end_hour" id="end_hour" />
                    </div>
                </div>
                {{-- Catch the combined time error --}}
                <input type="hidden" name="combined_time_range" value="catch">
                @error('combined_time_range')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <x-button type="submit" name="submit" text="Submit" class="w-fit my-2 btn-secondarybtn"/>
        </form>
    </main>
@endsection
