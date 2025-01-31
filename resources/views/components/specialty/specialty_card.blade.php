{{-- Each of these cards fire a search request for doctors with that specialty --}}

@push('styles')
    <style>
        .specialty_cell svg{
            width: 60px;
            height: 60px;
            fill: #498ef6f9;
        }
    </style>
@endpush
<a href="{{route('doctor.get_by_specialty', $specialty)}}" class="w-full p-4 flexible flex-col justify-center specialty_cell default_transition border-2 border-transparent hover:border-accent hover:shadow-lg rounded-md">
    {{-- icon --}}
    {!! file_get_contents(public_path('storage/specialty_icons/'.$specialty->icon_url))!!}
    
    <h2 class="text-lg text-center font-semibold text-primary">{{$specialty->name}}</h2>
    @if(isset($description) && $description == "show")
        <p class="text-sm text-justify text-secondary h-auto sm:min-h-[100px]">{{$specialty->description}}</p>
    @endif

    <p class="text-sm text-center text-secondary cursor-pointer">{{$specialty->doctors_count}} <span class="underline p-2">Doctors</span> > </p>
</a>