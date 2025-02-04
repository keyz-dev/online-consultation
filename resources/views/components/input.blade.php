<div class="w-full flex flex-col relative">
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

    @if(isset($icon) && $icon != null)
        <span class="absolute transform right-1 top-[70%] translate-y-[-50%] size-[30px] rounded-full inline-flex items-center justify-center text-sm text-accent bg-white" onclick="toggleVisibility(this)">
            <i class="{{$icon}}"></i>
        </span>
    @endif
    @error($name) 
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p> 
    @enderror 
</div> 

{{-- script for handling password visibililty toggling --}}
<script>
    function toggleVisibility(button){
        icon = button.children[0]
        input = button.previousElementSibling
        let array = ['far fa-eye', 'far fa-eye-slash']

        if(array.includes(icon.className)){
            if(input.type == 'password'){
                input.type = 'text'
                icon.className = 'far fa-eye-slash'
            }
            else{
                input.type = 'password'
                icon.className = 'far fa-eye'
            }
        }
    }
</script>
