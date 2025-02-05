@extends('layout.dashboard')

@section('content')

@push('styles')
    <style>
        .name-cell svg{
            width: 30px;
            height: 30px;
            fill: #467dd0e8;
        }
    </style>
@endpush

<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url 
        page="Q and As"
    />
    <div class="w-full flex items-center justify-between">
        <h1 class="text-[25px] text-primary font-medium">Q and As</h1>
        <a href="{{route('dashboard.admin.q_and_a.create')}}" class="flex items-center gap-2 px-3 py-1 text-white rounded-md">
            <x-button 
                text="Add Block"
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
                    name="questions_search"
                    placeholder="Search questions"
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
                    class="min-h-fit min-w-fit p-2 hover:bg-secondary-bg hover:opacity-80"
                />
               <x-button 
                    :icon="$grid_icon"
                    class="min-h-fit min-w-fit p-2 bg-secondary-bg hover:opacity-80"
               />
            </div>
        </div>

        <section class="w-full grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 pt-3">
            @forelse ($q_and_as as $q_and_a)
                <div class="w-full border-2 border-border_clr rounded-sm p-4 flex flex-col items-center gap-4">
                    <span class="size-[35px] font-bold inline-flex border rounded-full justify-center items-center bg-pending-bg text-secondary">
                        <i class="fas fa-question"></i>
                    </span>
                    <h2 class="text-lg text-center font-semibold text-primary">{{$q_and_a->question}}</h2>
                    <p class="text-sm text-center text-secondary">{{$q_and_a->answer}}</p>

                    <div class="flex w-full mt-4 items-center justify-between">
                        <a href="{{route('dashboard.admin.q_and_a.edit', $q_and_a)}}" class="px-4 py-1 bg-pending-bg hover:bg-opacity-50 ">Edit</a>
                        <a href="{{route('dashboard.admin.q_and_a.delete', $q_and_a)}}" class="px-4 py-1 bg-warning-bg hover:bg-opacity-50">Delete</a>
                    </div>
                </div>
                
            @empty
                <div class="w-full col-span-4 h-[100px] flex items-center justify-center bg-warning-bg text-secondary">
                    You have no Q and A Block yet
                </div>
            @endforelse

        </section>
    </main>
</section>
@endsection
