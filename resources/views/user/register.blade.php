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
                        <x-input type="text" name="name" label="Full Name" placeholder="User name" required/>
                        <x-input type="email" name="email" label="Email" placeholder="User email" required/>
                
                        <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                            <x-input type="text" name="Nationality" label="Country" placeholder="Enter your country" required/>
                            <x-input type="text" name="city" label="City" placeholder="Enter your city" required/>
                        </div>
            
                        <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                            <x-input type="date" name="dob" max="{{ date('Y-m-d') }}" label="Date of Birth" required/>
                            <div class="w-full flex flex-col">
                                <label for="gender">Gender</label>
                                <select class="border-2 border-border_clr outline-none p-2 focus:border-accent transition-all ease-in-out duration-600" name="gender" id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-between w-full items-center my-2">
                            <a href="">
                                <x-button text="Cancel" class="border border-border_clr text-primary bg-secondary-bg hover:bg-opacity-70"/>
                            </a>
                            <a href="#form-section-2">
                                <x-button text="Next" class="btn-secondarybtn"/>
                            </a>
                        </div>
        
                        <p class="text-center">Already have an account? <a href="{{route("user.login")}}" class="text-accent hover:underline">Login</a></p>
                    </section>
    
                    {{-- Second form --}}
                    <section class="flex flex-col basis-full gap-4 items-center sm:p-2" id="form-section-2">
                        <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                            <div class="flex flex-col gap-8 w-full items-center justify-between">
                                <x-input type="phone" name="phone" label="Phone" placeholder="Enter your phone number" required/>
                                <x-input type="whatsapp" name="whatsapp" label="Whatsapp" placeholder="Enter your whatsapp number" required/>
                            </div>
                            
                            <div class="h-[200px] w-full flex items-center justify-center">
                                <label for="input-file" id="drop-area" class="w-full h-full flex items-center justify-center flex-col">  
                                    <input type="file" accept="image/*" name="profile_image" id="input-file" hidden>
                                    <div class="border h-full flex flex-col gap-2 items-center justify-center w-full border-2-dashed border-border_clr bg-pending-bg rounded-sm bg-no-repeat bg-cover bg-center" id="img-view">
                                        <i class="fas fa-cloud-upload text-accent text-3xl font-semibold"></i>
                                        <p class="text-center text-sm text-secondary">Drop or click here <br/> to upload image</p>
                                    </div>
                                    @error('profile_image')
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                            <x-input type="password" name="password" label="Password" placeholder="Enter your password" required/>
                            <x-input type="password" name="password_confirmation" label="Confirm password" placeholder="confirm your password" required/>
                        </div>
                        
                        <div class="flex justify-between w-full items-center my-2">
                            <a href="#form-section-1">
                                <x-button text="Previous" class="border border-border_clr text-primary bg-secondary-bg hover:bg-opacity-70"/>
                            </a>
                            {{-- submit button --}}
                            <x-button type="submit" text="Create Account" class="btn-secondarybtn"/>
                        </div>
                    </section>
                    
                </div>
            </div>

        </div>    
    </form>
</section>
@endsection