<div class="flexible gap-5 flex-col bg-white p-8 rounded-lg">
    <h2 class="text-xl font-semibold">{{$service['name']}}</h2>
    <p class="text-[13px] text-slate-400 pb-4 sm:h-[80px] font-normal">{{$service['description']}}</p>

    <div class="w-full h-[180px]">
        <img src="{{$service['image']}}" class="w-full h-full object-cover object-center rounded-lg" alt="service image">
    </div>
</div>