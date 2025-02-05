<div class="flex w-full sm:min-w-[400px] sm:w-auto flex-col gap-4 items-center">
    <h1 class="text-xl font-semibold">{{$title}}</h1>
    @csrf
    <x-text-area name="question" label="Question" placeholder="Medical Question" rows="2" cols="30" value="{{$q->question ?? ''}}"/>
        
    <x-text-area name="answer" label="Question Response" placeholder="Response to the question" rows="4" cols="30" value="{{$q->answer ?? ''}}"/>

    <x-button type="submit" name="submit" text="{{$title}}" class="w-full my-2 btn-secondarybtn" />
</div>
