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

@php
    function getDateFromWeekAndDay($dayName, $weekNumber, $year) {
    // Convert the day name to a numeric representation (0 = Sunday, 6 = Saturday)
    $dayOfWeek = date('w', strtotime($dayName)); // Numeric representation of the day (0 for Sunday, 6 for Saturday)

    // Get the first day of the year
    $firstDayOfYear = new DateTime("first day of January $year");

    // Get the date of the first day of the specified week
    $firstWeekStart = clone $firstDayOfYear;
    $firstWeekStart->modify("+".($weekNumber - 1)." weeks");

    // Find the date of the specified day in that week
    $date = $firstWeekStart->modify("+" . $dayOfWeek . " days");

    // Format the date to "d, M"
    return $date->format('d, M');
}

function format_time($time){
    return date('h:i a', strtotime($time));
}
@endphp

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

    <main class="w-full h-full bg-white p-2 divide-y divide-gray-200 flex flex-col gap-4 py-4">
        {{-- Display the availability of the current week --}}
        <div class="flex flex-col w-full gap-4 items-center">
            <h2 class="text-base font-medium text-primary w-full ">Current Week Availability</h2>

            {{--Check if the current week is null  --}}
            <div class="flex items-center justify-center gap-5">
                @forelse ( $currentWeekSlots as $day => $slots)

                <div class="flex flex-col gap-5 items-center justify-center">
                    @php
                        $date = getDateFromWeekAndDay($day, date('W'), date('Y'));

                        $day_caps = strtoupper(substr($day, 0, 3));
                    @endphp
                    <div>
                        <h4>{{$day_caps}}</h4>
                        <p class="text-secondary text-sm ">{{$date}}</p>
                    </div>
                    <div class="flex flex-col gap-3">
                        @foreach ($slots as $slot)
                            <div class="inner-flex items-center justify-center p-3 bg-footer text-primary rounded-md">
                                <span>{{ format_time($slot['start_time']) }} - {{ format_time($slot['end_time']) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @empty
                    <div class="bg-warning-bg text-warning p-4 flex items-center justify-center">
                        <span>No Availabilty has been set for the current week</span>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Display that for the upcoming week if it has been set --}}

        <div class="flex flex-col w-full gap-4 items-center py-4">
            <h2 class="text-base font-medium text-primary w-full ">Upcoming Week Availability</h2>

            {{--Check if the current week is null  --}}
            <div class="flex items-center justify-center gap-5">
                @forelse ( $nextWeekSlots as $day => $slots)

                <div class="flex flex-col gap-5 items-center justify-center">
                    @php
                        $date = getDateFromWeekAndDay($day, date('W'), date('Y'));

                        $day_caps = strtoupper(substr($day, 0, 3));
                    @endphp
                    <div>
                        <h4 class="font-semibold">{{$day_caps}}</h4>
                        <p class="text-secondary text-sm ">{{$date}}</p>
                    </div>
                    <div class="flex flex-col gap-3">
                        @foreach ($slots as $slot)
                            <div class="inner-flex items-center justify-center p-3 bg-footer text-primary rounded-md">
                                <span>{{ format_time($slot['start_time']) }} - {{ format_time($slot['end_time']) }}</span>

                            </div>
                        @endforeach
                    </div>
                </div>

                @empty
                    <div class="bg-warning-bg text-warning p-4 flex items-center justify-center">
                        <span>No Availabilty has been set for the coming week</span>
                        <a href="{{route('dashboard.doctor.availability.set')}}" class="flex items-center gap-2 px-3 py-1 text-error font-bold">
                            Set it now
                        </a>

                    </div>
                @endforelse
            </div>
        </div>
    </main>
@endsection
