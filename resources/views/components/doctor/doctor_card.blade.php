<div class="flexible flex-col bg-white rounded-lg w-full md:max-w-[300px] border p-4 default_transition hover:border-accent">
    <div class="w-full h-[300px] rounded-lg overflow-hidden">
        <img src="{{asset('storage/'.$doctor->user->profile_image)}}" class="w-full h-full object-cover object-center default_transition transform hover:scale-[1.1]" alt="service image">
    </div>

    <h2 class="text-xl font-semibold">Dr. {{$doctor->user->name}}</h2>
    <p class="text-[13px] text-secondary font-normal">{{$doctor->specialty->noun}}</p>

    <p class="text-[13px] text-secondary font-normal w-full"><span class="font-semibold text-[15px]">{{$doctor->experience}}</span> Years Of experience</p>
    <div class="flex w-full items-center justify-between">
        <p class="text-[13px] text-secondary font-normal"><span class="font-semibold text-[15px]">{{(int)$doctor->consultation_fee}}</span> XAF Fee</p>

        <a href="{{route('doctor.show', $doctor)}}" class="cursor-pointer hover:underline-offset-2 text-secondary text-sm font-semibold hover:text-accent-dark">...View Profile</a>
    </div>


    <a href="" class="flex items-center gap-1 border border-line_clr w-full mt-4">
        <x-button
            text="Book Appointment"
            class="text-sm font-semibold text-secondary px-4 py-2 min-w-full min-h-fit hover:bg-accent hover:text-white"
        >
            <i class="fas fa-chevron-right"></i>
        </x-button>
    </a>
</div>
