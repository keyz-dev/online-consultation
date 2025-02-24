@extends('layout.index')
@section('title', 'Book Appointment')

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

@section('content')
    <section class="container min-h-[60.73vh]">
        <form action="{{route('book_appointment.store', $doctor)}}" method="POST" class="mx-auto w-full md:min-w-[50%] md:max-w-[90%] lg:max-w-[90%] flex items-center sm:items-start sm:flex-row justify-center h-auto gap-4 md:px-9 md:py-4" enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col w-full gap-4 items-center">
                <h2 class="text-lg font-bold text-primary ">Dr. <span>{{$doctor->user->name}}'s Schedule for the week <span class="text-accent">(choose one)</span></h2>

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
                                    <input type="radio" name="slot" id="{{$slot['id']}}" value="{{$slot['id']}}">
                                    <label for="{{$slot['id']}}">{{ format_time($slot['start_time']) }} - {{ format_time($slot['end_time']) }}</label>
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

                 {{-- Catch the combined time error --}}
                 <input type="hidden" name="error_display" value="catch">
                 @error('error_display')
                     <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                 @enderror

                <x-button type="submit" name="submit" text="Create" class="w-fit my-2 btn-secondarybtn"/>
                </div>
            </div>
        </form>
    </section>
@endsection
