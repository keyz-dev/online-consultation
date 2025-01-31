
<style>
    .search_form svg{
        fill: rgb(102, 100, 100);
    }
</style>
<div class="container py-4 flexible justify-between">
    <form action="" method="POST">
        <div class="w-full flexible">
            <label for="specialty">Specialties</label>
            <select class="border-2 border-border_clr outline-none p-2 focus:border-accent transition-all ease-in-out duration-600" name="specialty_id" id="specialty">
                <option value="all" selected>All</option>
                @foreach ($specialties as $specialty)
                    <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                @endforeach
            </select>
        </div>
    </form>

    {{-- The search input --}}
    <form class="search_form" action="" method="POST">
        {{-- iclass is for the input within the container --}}
        <x-search 
            name="doctor_search"
            placeholder="Search for a doctor"
            class="border-2 border-border_clr"
            iclass="border-none outline-none min-w-[320px] placeholder:text-slate-400 placeholder:text-[13px]"
        />
    </form>
</div>