@push('styles')
    <style>
        .name-cell svg{
            width: 30px;
            height: 30px;
            fill: #5397fdba;
        }
    </style>
@endpush

<section class="h-[35vh] w-screen bg-cover bg-no-repeat bg-center" style="background-image: url({{$bg}})">
    <div class="h-full w-full bg-opacity-80 bg-slate-950 text-white flexible justify-center">
       {{-- Create the main container --}}
        <div class="container w-full h-full flex flex-col items-center justify-center gap-8 sm:gap-10">
            {{-- title --}}
            <h2 class="text-[32px] sm:text-[40px] md:text-[48px] tracking-[5px] font-semibold font-hero">{{$text}}</h2>
            
            {{-- Route indicator --}}
            <div class="flex items-center justify-center gap-2 text-sm">
                {{-- Route to the home --}}
                <a href="{{route('home.index')}}" class="hover:opacity-50 hover:underline transition duration-200 font-bold">Home</a>
                {!! file_get_contents(public_path('icons/keyboard_arrow_right.svg')) !!}
            
                {{-- Route to the Doctors --}}
                <a href="{{route('home.doctors')}}" class="hover:opacity-50 hover:underline transition duration-200 font-bold">Doctors</a>
                {!! file_get_contents(public_path('icons/keyboard_arrow_right.svg')) !!}
            
                <span>
                    {{$route}}
                </span>
            </div>
            
        </div>
    </div>
</section>