@extends('layout.dashboard')
@section('content')
@push('styles')
    <style>
        .name-cell svg{
            width: 30px;
            height: 30px;
            fill: #5397fdba;
        }
    </style>
@endpush
<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url 
        page="Symptoms"
    />
    <div class="w-full flex items-center justify-between">
        <h1 class="text-[25px] text-primary font-medium">Symptoms</h1>
        <a href="{{route('dashboard.admin.symptom.create')}}" class="flex items-center gap-2 px-3 py-1 text-white rounded-md">
            <x-button 
                text="Add Symptom"
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
                    placeholder="Search Symptoms"
                    class=""
                    iclass="border-none outline-none min-w-[320px] placeholder:text-slate-400 placeholder:text-sm"
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


        <div class="w-full bg-white p-4 max-h-[75vh] overflow-x-auto">
            <table class="min-w-full">
                <thead class="text-left text-lg font-medium border-b border-border_clr  ">
                <tr>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">Name</th>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">ID</th>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">Specialty</th>
                    <th class="text-secondary text-[14px] font-medium min-w-[150px]">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($symptoms as $symptom)
                        <tr class="border-b-2 border-b-border_clr">
                            <td class="py-2 name-cell">
                                <div class="flex items-center gap-3">
                                    {!! file_get_contents(public_path('storage/symptom_icons/'.$symptom->icon_url)) !!}
                                    <h2 class="font-normal">{{$symptom->name}}</h2>
                                </div>
                            </td>
                            <td class="">
                                <span>{{$symptom->id}}</span>
                            </td>
                            <td class="">
                                <p>{{$symptom->specialty->name}}</p>
                            </td>
                            
                            <td class="text-xl text-secondary">
                                <div class="relative action_parent group">
                                    <i class="fas fa-ellipsis-h"></i>
                                    <div class="absolute transition-all duration 200 transform scale-0 group-hover:scale-100 left-[40%] -top-4 text-sm flex flex-col gap-1 bg-gray-200">
                                        <a href="{{route('dashboard.admin.symptom.edit', $symptom)}}" class="w-full hover:bg-gray-100 px-2 py-1">Edit</a>
                                        <a href="{{route('dashboard.admin.symptom.delete', $symptom)}}" class="w-full hover:bg-gray-100 px-2 py-1">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
</section>
@endsection
