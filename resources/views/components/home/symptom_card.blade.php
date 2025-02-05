@push('styles')
    <style>
        .symptom_cell svg{
            width: 60px;
            height: 60px;
            fill: #498ef6f9;
        }
    </style>
@endpush
<div href="" class="w-full p-4 flexible flex-col justify-center symptom_cell default_transition ">
    {{-- icon that when clicked should fire the doctor search request --}}
    <a href="{{route('doctor.get_by_specialty', $symptom->specialty)}}" class="flexible justify-center p-4 bg-slate-200 border hover:border-accent hover:shadow-lg rounded-md ">
        {!! file_get_contents(public_path('storage/symptom_icons/'.$symptom->icon_url))!!}
    </a>
    
    <span class="text-sm text-center font-semibold text-primary">{{$symptom->name}}</span>

    <a href="{{route('doctor.get_by_specialty', $symptom->specialty)}}">
        <x-button 
            text="Consult >"
            class="min-w-fit min-h-fit border border-border_clr text-xs font-normal hover:bg-slate-200 rounded-xs"
        />
    </a>
</div>