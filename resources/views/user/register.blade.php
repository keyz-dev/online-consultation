@extends('layout.index')

@section('title', 'Register')

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/register.js') }}" defer></script>
@endpush

@push('styles')
    <style>
        .stepper a span{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            border: 1px solid #DCDEE3;
        }
    </style>
@endpush

@section('content')
<section class="container">
    <form action="{{route("user.create")}}" method="POST" class="mx-auto w-full md:min-w-[50%] md:max-w-[90%] lg:max-w-[90%] flex items-center sm:items-start sm:flex-row justify-center h-auto gap-4 md:px-9 md:py-4" enctype="multipart/form-data">
        @csrf
        <div class="flex w-full md:w-[450px] flex-col gap-4 items-center">
            <h1 class="text-xl font-semibold">Join Us Now</h1>

            <div class="stepper text-center flex items-center">
                <a href="#form-section-1" class="active">
                    <span class="">1</span>
                </a>
                <hr class="w-[100px] h-[2px] mx-2 border-none bg-line_clr">
                <a href="#form-section-2">
                    <span>2</span> 
                </a>
            </div>

            {{-- Carousel --}}
            <div class="h-auto overflow-hidden w-full">
                {{-- slider --}}
                <div class="w-[200%] h-full flex overflow-hidden">
                    {{-- Form section 1 --}}
                    <section class="flex basis-full flex-col gap-4 items-center sm:p-2" id="form-section-1">
                        <x-user_form.register.form_one />
                    </section>
    
                    {{-- Second form --}}
                    <section class="flex flex-col basis-full gap-4 items-center sm:p-2" id="form-section-2">
                        <x-user_form.register.form_two />
                            
                    </section>
                </div>
            </div>    
        </div>
    </form>
</section>
@endsection