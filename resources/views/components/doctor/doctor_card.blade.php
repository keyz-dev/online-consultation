<div class="flexible gap-5 flex-col bg-white p-8 rounded-lg">
    <div class="w-full h-[300px]">
        <img src="{{asset('storage/'.$doctor->user->profile_image)}}" class="w-full h-full object-cover object-center rounded-lg" alt="service image">
    </div>

    <h2 class="text-xl font-semibold">{{$doctor->user->name}}</h2>
    <p class="text-[13px] text-slate-400 pb-4 sm:h-[80px] font-normal">{{$doctor->specialty->name}}</p>
    <p class="text-[13px] text-slate-400 pb-4 sm:h-[80px] font-normal">{{$doctor->experience}} years of experience</p>
</div>  