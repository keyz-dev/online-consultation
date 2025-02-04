@push('scripts')
    <script type="text/javascript" src="{{asset('js/navbar.js')}}" defer></script>
@endpush

<header class="w-full flex flex-col z-20" >
    <div class="container h-auto flex flex-col items-center sm:flex-row sm:items-center gap-2 py-1 bg-white border-b border-b-line_clr justify-between">
        <div class="flex items-center gap-2">
            <ion-icon class="text-accent size-[30px]" name="call-outline"></ion-icon>
            <span>Call Us - (+237) 682980313</span>
        </div>
        <form action="">
            <label for="language"> Prefered Language: </label>
            <select name="language" id="language" class="outline-none p-2 border border-border_clr">
                <option value="english" selected>English</option>
                <option value="french">French</option>
            </select>
        </form>
    </div>
    <nav class="container flex items-center justify-around md:justify-between py-1 px-3 relative z-10 bg-white">
        <x-button 
            type="button"
            id="toggleNavBarBtn"
            icon="<i class='fas fa-bars'></i>"
            class="text-xl md:hidden z-10 min-w-fit min-h-fit" 
        />
        <a href="{{route('home.index')}}" class="z-10 text-xl font-bold ">
            <x-logo :logo="$logo" />
        </a>

        <div id="navbar" class="absolute left-[-250%] top-[100%] transition-all duration-500 ease-in-out bg-accent-light flex flex-col justify-center min-w-[300px] min-h-[60vh] md:min-h-fit md:bg-transparent md:static md:left-auto md:flex-row md:flex-end items-start md:w-auto md:items-center md:justify-between z-1">
            <ul class="flex flex-col md:flex-row justify-between gap-6 sm:gap-2 sm:mr-0 md:items-center h-full space-x-5 mb-4 md:mb-0 lg:mr-36">
                <li class="list-item"><a id="{{Route::is('home.index') ? 'active-link': ''}}" href="{{route('home.index')}}">Home</a></li>
                <li class="list-item"><a href="{{route('home.index')}}#services">Services</a></li>
                <li class="list-item"><a href="{{route('home.index')}}">About Us</a></li>
                <li class="list-item relative group">
                    <div class="flex gap-2 items-center">
                        <span>Pages</span>
                        <ion-icon name="chevron-down"></ion-icon>
                    </div>
                    <div class="absolute hidden flex-col gap-2 bg-white p-3 left-[100%] top-[100%] transition-transform transform translate-x-[-50%] group-hover:flex">
                        <a href="{{route('home.specialties')}}">Specialties</a>
                        <a href="{{route('home.doctors')}}">Doctors</a>
                        <a class="text-nowrap" href="{{route('home.index')}}#symptoms">Major Concerns</a>    
                    </div>
                </li>
                <li class="list-item"><a href="{{route('home.index')}}">Contact</a></li>
            </ul>
            <div class="flex flex-col ml-1 md:flex-row md:gap-[2px] items-center">
                @if(Auth::check())
                    <x-profile_info />
                @else
                    <a href="{{route('user.login')}}">
                        <x-button
                            type="button"
                            text="Login"
                            class="bg-transparent text-black min-w-fit hover:bg-accent-light w-[90px]"
                        />
                    </a>
                    <a href="{{route('user.register')}}">
                        <x-button
                            type="button"
                            text="Join Us"
                            class="bg-accent text-white min-w-fit rounded-[2px] hover:opacity-80 w-[90px]"
                        />
                    </a>
                @endif
            </div>
        </div>
    </nav>  
    
    <x-message_toast />
</header>