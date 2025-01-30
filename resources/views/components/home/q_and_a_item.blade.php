<div class="flexible px-4 py-2 flex-col border gap-2 rounded-md">
    <button class="flexible flex-col justify-between w-full question_btn text-primary" onclick="toggleSubMenu(this)">
        <div class="w-full flexible justify-between">
            <span class="size-[35px] font-bold inline-flex border rounded-full justify-center items-center bg-pending-bg ">
                <i class="fas fa-question"></i>
            </span>
            <p class="basis-full text-left">{{$q->question}}</p>
        
            {!! file_get_contents(public_path("icons/keyboard_arrow_down.svg")) !!}
        </div>
    </button>
    <div class="w-full text-left text-sm answer_div text-secondary">
        <div class="w-full text-left">
            <span>{{$q->answer}}</span>
        </div>
    </div>
</div>




