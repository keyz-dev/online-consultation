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
        page="Appoointments"
    />

    <main class="w-full h-full bg-white p-2 divide-y-2">
        <div class="w-full bg-white p-4 max-h-[75vh] overflow-x-auto">
            <table class="min-w-full">
                <thead class="text-left text-lg font-medium border-b border-border_clr  ">
                <tr>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">App ID</th>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">Patient name</th>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">Schedules For</th>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">At</th>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">status</th>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        @php
                            $user = $appointment->patient->user;
                            $slot = App\Models\Slot::find($appointment->slot_id);
                        @endphp
                        <tr class="border-b-2 border-b-border_clr">
                            <td class="">
                                <span>{{$appointment->id}}</span>
                            </td>
                            <td class="py-2 name-cell">
                                <div class="flex items-center gap-3">
                                    <img src="{{asset('storage/'.$user->profile_image)}}" alt="img" class="size-[40px] rounded-full object-cover object-center">
                                    <h2 class="font-normal">{{$user->name}}</h2>
                                </div>
                            </td>
                            <td class="">
                                <span>{{$slot->day}}</span>
                            </td>
                            <td class="">
                                {{ format_time($slot->start_time) }} - {{ format_time($slot->end_time) }}
                            </td>
                            <td class="">
                                @php
                                    $status = $appointment->status;
                                    $background = ($status == 'pending') ? 'pending-bg' : ($status == 'accepted' ? 'success-bg' : 'warning-bg');
                                    $text = ($status == 'pending') ? 'pending' : ($status == 'accepted' ? 'success' : 'warning');
                                @endphp
                                <span class="px-3 py-1 text-sm bg-{{$background}} text-{{$text}} rounded-full inline-flex items-center justify-center">
                                    {{$appointment->status}}
                                </span>
                            </td>

                            <td class="text-xl text-secondary">
                                <div class="relative action_parent group">
                                    <i class="fas fa-ellipsis-h"></i>
                                    <div class="absolute transition-all duration 200 transform scale-0 group-hover:scale-100 left-[40%] -top-4 text-sm flex flex-col gap-1 bg-gray-200">
                                        <a href="" class="w-full hover:bg-gray-100 px-2 py-1">Accept</a>
                                        <a href="" class="w-full hover:bg-gray-100 px-2 py-1">Deny</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

@endsection
