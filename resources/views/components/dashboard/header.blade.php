<style>
    svg{
        flex-shrink: 0; /*prevent size distortion */
        fill: var(--text-clr)
    }
</style>

<header class="flex w-full justify-between px-4 items-center bg-white ">
    <div class="flex gap-3 items-center">
        <a href="{{route('home.index')}}" class="">
            <x-logo :logo="$logo" />
        </a>
        <button onclick=toggleSideBar() id="toggle-btn" class="text-secondary">
            {!! file_get_contents(public_path('icons/keyboard_double_arrow_left.svg')) !!}
        </button>
        <div>
            <x-search
                name="global_search"
                placeholder="Search Activities"
                class=""
                iclass="border-none outline-none min-w-[320px] placeholder:text-slate-400 placeholder:text-sm"
            />
        </div>
    </div>
    <nav class="flex gap-4 items-center">
        <div class="flex gap-5 items-center">
            <a class="text-[#b5b6b6bd] text-[18px]" href="{{route('dashboard.admin.calls')}}">
                <i class="fas fa-phone relative">
                    <span class="absolute border rounded-full size-[12px] top-[-20%] right-[-35%]" id="call_indicator"></span>
                </i>
            </a>
            <a class="text-[#b5b6b6bd] text-[18px]" href="{{route('dashboard.admin.chats')}}">
                <i class="fas fa-message relative">
                    <span class="absolute border rounded-full size-[12px] top-[-20%] right-[-35%]" id="mail_indicator"></span>
                </i>
            </a>
            <a class="text-[#b5b6b6bd] text-[18px]" href="{{route('dashboard.admin.notifications')}}">
                <i class="fas fa-bell relative">
                    <span class="absolute border rounded-full size-[12px] top-[-20%] right-[-35%]" id="notification_indicator"></span>
                </i>
            </a>
        </div>
        <x-profile_info />
    </nav>
</header>
