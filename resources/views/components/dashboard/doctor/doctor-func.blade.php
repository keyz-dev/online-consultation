<div class="h-[36vh] {{$bgColor}} text-white rounded-lg flex flex-col gap-1 font-rufus p-5  hover:transition-all hover:duration-300 hover:ease-in-out hover:translate-y-[-5px] hover:shadow-inner hover:shadow-red-700">
    <div>
        <p class="text-[15px]">{{ $title }}</p>
        <h2 class="text-2xl">{{ $subtitle }}</h2>
    </div>
    <div class="p-2 break-words space-y-3">
       {{$content}}
    </div>
    <div class="text-[18px]">
        <a href="" class="cursor-pointer">Learn More</a>
    </div>
</div>