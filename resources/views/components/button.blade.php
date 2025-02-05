<button
    type = {{$type}}
    {{$attributes->merge(['class' => "btn flex items-center justify-center gap-2 $class"])}}
>
    @if ($icon)
        <span>{!! $icon !!}</span>
    @endif
    {{$text}}
    {{$slot}}
</button>