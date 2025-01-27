@extends('layout.dashboard')

@section('content')

<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url 
        page="Specialties"
    />
    <div class="w-full flex items-center justify-between">
        <h1 class="text-[25px] text-primary font-medium">Specialties</h1>
        <a href="{{route('dashboard.admin.specialty.create')}}" class="flex items-center gap-2 px-3 py-1 text-white rounded-md">
            <x-button 
                text="Add Specialty"
                icon='<i class="fas fa-plus"></i>'
                class="btn-secondarybtn"
            />
        </a>
    </div>

    <main class="w-full h-full bg-white p-2 divide-y-2">
        <div class="w-full flex items-center justify-between gap-4 pb-3">
            <div class="flex items-center gap-3">
                @php
                    $filter_icon = file_get_contents(public_path('icons/filter.svg'))
                @endphp
                <x-button 
                    text="Filter"
                    :icon="$filter_icon"
                    class="bg-secondary-bg min-h-[40px] rounded-lg min-w-fit"
                />
                <x-search 
                    name="specialty_search"
                    placeholder="Search Specialties"
                    class="border-none outline-none min-w-[320px] placeholder:text-slate-400 placeholder:text-sm"
                />
            </div>

            <div class="flex items-center gap-3">
                @php
                    $grid_icon = file_get_contents(public_path('icons/grid_view.svg'));
                    $list_icon = file_get_contents(public_path('icons/list.svg'))
                @endphp

                <x-button 
                    :icon="$list_icon"
                    class="min-h-fit min-w-fit p-2 bg-secondary-bg hover:opacity-80"
                />
               <x-button 
                    :icon="$grid_icon"
                    class="min-h-fit min-w-fit p-2 hover:bg-secondary-bg hover:opacity-80"
               />
            </div>
        </div>

        <div>
            {{dump($specialties)}}
        </div>

    </main>
</section>
@endsection
