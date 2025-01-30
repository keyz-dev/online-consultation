<div class="flex gap-3 bg-secondary-bg rounded-lg px-1 h-[40px]">
    <x-input 
        type="text" 
        :name="$name" 
        :placeholder="$placeholder" 
        :class="$class"
    />
    <button class="p-2">
        {!! file_get_contents(public_path('icons/search.svg')) !!}
    </button>
</div>