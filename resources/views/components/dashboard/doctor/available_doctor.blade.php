
<div class="text-slate-500">
    <div class="w-[250px] h-[45vh] border-[1px] border-solid border-slate-300 flex flex-col justify-start items-center pt-3 gap-1 rounded-lg hover:bg-slate-300 hover:text-black hover:transition-all hover:duration-150 hover:ease-in-out hover:first-letter:text-3xl">
        <div><img class="rounded-full w-[150px] h-[150px]" src="{{ asset('./storage/profile_images/rufus01.jpg') }}" alt=""></div>
        <div><h2 class="text-[18px] first-letter:text-blue-600 font-bold">{{ $name }}</h2></div>
        <div>{{ $nationality}} -- {{ $city }}</div>
        <div>{{ $status }}</div>
    </div>
</div>