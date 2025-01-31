<div class="flexible flex-col bg-white rounded-lg max-w-[300px] w-full border p-4">
    <div class="w-full h-[300px]">
        <img src="{{asset('storage/'.$doctor->user->profile_image)}}" class="w-full h-full object-cover object-center rounded-lg" alt="service image">
    </div>

    <h2 class="text-xl font-semibold">Dr. {{$doctor->user->name}}</h2>
    <p class="text-[13px] text-secondary font-normal">{{$doctor->specialty->noun}}</p>
    
    <div class="flexible justify-between w-full">
        <p class="text-[13px] text-secondary font-normal"><span class="font-semibold text-[15px]">{{$doctor->experience}}</span> Years Of experience</p>
        <p class="text-[13px] text-secondary font-normal"><span class="font-semibold text-[15px]">{{(int)$doctor->consultation_fee}}</span> XAF Fee</p>
    </div>

    <a href="{{route('doctor.show', $doctor)}}" class="cursor-pointer hover:underline-offset-2 text-secondary w-full text-sm font-semibold hover:text-accent-dark">...View Profile</a>

    <a href="" class="flex items-center gap-1 border border-line_clr w-full">
        <x-button 
            text="Book Appointment"
            class="text-sm font-semibold text-secondary px-4 py-2 min-w-full min-h-fit hover:bg-accent hover:text-white"
        >
            <i class="fas fa-chevron-right"></i>
        </x-button>
    </a>
</div>  