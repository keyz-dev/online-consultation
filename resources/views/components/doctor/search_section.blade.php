
<style>
    .search_form svg, .filter_form button svg{
        fill: rgb(95, 94, 94);
    }
    .filter-form{
        border: 1px solid #2567c9;
        border-radius: 8px;
        padding: 8px 16px;
        margin-left: 16px;
    }
</style>
<div class="container py-4 flexible justify-between">

    <form action="{{route('doctor.get_specialty')}}" method="POST" class="flexible">
        @csrf
        <div class="w-full flexible">
            <label for="specialty">Specialties</label>
            <select class="border-2 border-border_clr outline-none p-2 focus:border-accent transition-all ease-in-out duration-600" name="specialty_id" id="specialty">
                <option value="all" selected>All</option>
                @foreach ($specialties as $specialty)
                    <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                @endforeach
            </select>
        </div>
        @php
            $filter_icon = file_get_contents(public_path('icons/filter.svg'))
        @endphp
        <x-button 
            text="Filter"
            type="submit"
            class="bg-secondary-bg min-h-[40px] rounded-lg min-w-fit"
        />
    </form>

    {{-- The search input --}}
    <form class="search_form" action="{{route('doctor.get_by_name')}}" method="POST">
        @csrf
        {{-- iclass is for the input within the --}}
        <x-search 
            name="doctor_name"
            placeholder="Search for a doctor by name"
            class="border-2 border-border_clr"
            iclass="border-none outline-none min-w-[320px] placeholder:text-slate-400 placeholder:text-[13px]"
        />
    </form>
</div>