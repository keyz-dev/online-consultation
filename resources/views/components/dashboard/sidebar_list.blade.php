<li class="{{Route::is($route) ? 'active' : ''}}" title="{{$title}}">
    <a href="{{route($route)}}">
        @if (isset($svg))
            @php
                $svg_content = file_get_contents(public_path("icons/$svg.svg"));
            @endphp
            {!! $svg_content !!}
        @endif
        <span>{{$title}}</span>
    </a>
</li>