<div class="w-full flex flex-col">
    @if ($label)
        <label for="{{ $id }}" class="block transition-all duration-300 transform text-base font-medium text-black z-0 px-2 {{$label_styles}}">
            {{ $label }} 
        </label> 
    @endif 
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $id }}" 
        value="{{ old($name, $value) }}" 
        placeholder="{{ $placeholder }}" 
        {{ $attributes->merge(['class' => "placeholder:text-xs placeholder:text-secondary placeholder:font-normal outline-none p-2 w-full bg-transparent border-2 border-border_clr focus:border-accent transition-all ease-in-out duration-600 $class"]) }}
        @if($disabled === "true")
        disabled
        @endif
    />
    @error($name) 
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
    @enderror 
</div> 
