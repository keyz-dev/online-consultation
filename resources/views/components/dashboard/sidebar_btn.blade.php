{{-- The dropdown btns for the sidebar --}}
<li title="{{$title}}">
    <button class="dropdown-btn {{Route::is($route) ? 'bg-[#cdd6fb6d]' : ''}}" onclick="toggleSubMenu(this)">
        {{-- First icon --}}
        @if (isset($svg))
            @php
                $svg_content = file_get_contents(public_path("icons/$svg.svg"));
            @endphp
            {!! $svg_content !!}
        @endif
    
        {{-- insert the text --}}
        <span>{{$title}}</span>
        
        {!! file_get_contents(public_path("icons/keyboard_arrow_down.svg")) !!}
    
        {{-- The ul with anchors --}}
    </button>    
    <ul class="sub-menu">
        <div>
            @foreach($anchors as $title => $route)
                <x-dashboard.sidebar_list
                    :route="$route"
                    :title="$title"
                />
            @endforeach
        </div>
   </ul>
</li>