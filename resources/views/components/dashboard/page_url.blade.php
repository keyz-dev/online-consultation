<div class="w-full flex items-center gap-2 text-secondary text-sm">
    <a href="{{route('dashboard.'.$index)}}" class="hover:opacity-50 hover:underline transition duration-200">App</a>
    {!! file_get_contents(public_path('icons/keyboard_arrow_right.svg')) !!}

    <span>
        {{$page}}
    </span>
</div>
