<div class="w-full flex flex-col">
    @if ($label)
        <label for="{{ $id }}" class="block transition-all duration-300 transform text-base font-medium text-black z-1 px-1">
            {{ $label }}
        </label>
    @endif
    <textarea
        name="{{ $name }}" 
        id="{{ $id }}" 
        cols = "{{$cols}}"
        rows = "{{$rows}}"
        placeholder="{{ $placeholder }}" 
        {{ $attributes->merge(['class' => "placeholder:text-xs placeholder:font-normal placeholder:text-slate-400 outline-none p-2 form-input w-full bg-transparent border-2 border-border_clr focus:border-accent transition-all ease-in-out duration-600 $class"]) }}
    >
{{old($name, $value)}}</textarea>
    @error($name)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
