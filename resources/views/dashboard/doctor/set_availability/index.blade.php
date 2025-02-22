@extends('layout.dashboard')

@section('content')
@push('styles')
    <style>
        .name-cell svg{
            width: 30px;
            height: 30px;
            fill: #5397fdba;
        }

        .info_button.rotate svg:last-child{
            rotate: 180deg !important;
        }

        .info_div{
            transition: 300ms ease-in-out;
            display: grid;
            grid-template-rows: 0fr;
            > div{
                overflow: hidden;
            }
        }
        .info_div.show{
            grid-template-rows: 1fr;
        }
    </style>
@endpush

<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url index='doctor'
        page="Set Availability"
    />
    <div class="w-full flex items-center justify-between">
        <h1 class="text-[25px] text-primary font-medium">Set Availability</h1>
    </div>

    <main class="w-full h-full">

        <div class="bg-warning-bg w-fit text-warning p-4 flexible items-center justify-center">
            <span class="text-error font-bold rounded-full p-2 border border-error inline-flex items-center justify-center">
                NB
            </span>

            <span>This setting is for the upcoming week <br> and can only be done between Wednesday and Friday Of this week</span>
        </div>
        <p class="text-base text-secondary py-3">Choose an Availability Setting !!</p>

        <section class="w-full flex flex-col md:flex-row gap-4">

            <div class="flex flex-col border border-transparent rounded-sm transition-all duration-200 p-1">
                <div class="flexible">
                    <a href="{{route('dashboard.doctor.availability.set.equivalent')}}">
                        <x-button text="Equivalent Setting" class="btn-secondarybtn bg-pending-bg text-pending"/>
                    </a>

                    <span title="More info" id="info" class="info_button text-pending text-lg cursor-pointer" onclick="toggleShowInfo(this)">
                        <i class="fas fa-info-circle"></i>
                    </span>
                </div>

                <div class="w-full text-left text-sm info_div text-secondary">
                    <div class="max-w-[200px] py-1">
                        <span class="">
                            Setting up THE SAME consultation duration and time range for the days chosen
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col border border-transparent rounded-sm transition-all duration-200 p-1">
                <div class="flexible">
                    <a href="">
                        <x-button text="Individual Setting" class="btn-secondarybtn bg-special-bg text-special"/>
                    </a>

                    <span title="More info" id="info" class="info_button text-special text-lg cursor-pointer" onclick="toggleShowInfo(this)">
                        <i class="fas fa-info-circle"></i>
                    </span>
                </div>

                <div class="w-full text-left text-sm info_div text-secondary">
                    <div class="max-w-[200px] py-1">
                        <span>
                            Set up the consulation duration and the time range independently,  for each of the days
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{--Script to handle display and hidden information  --}}
    <script defer>
        const toggleShowInfo = (button) =>{
            infor_box = button.parentElement.nextElementSibling
            parent = infor_box.parentElement
            infor_box.classList.toggle('show');
            parent.classList.toggle("border-pending-bg")
        }
    </script>

@endsection
