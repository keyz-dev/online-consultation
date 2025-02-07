@extends('layout.dashboard')

@section('content')
@push('styles')
    <style>
        .name-cell svg{
            width: 30px;
            height: 30px;
            fill: #5397fdba;
        }
        table > tbody > tr > td{
            padding: 7px 0;
        }
    </style>
@endpush

<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url index='doctor'
        page="Edit Profile"
    />
    <div class="w-full flex items-center justify-between">
        <h1 class="text-[25px] text-primary font-medium">Edit Profile</h1>
    </div>

    <main class="w-full h-full flex flex-col gap-4">
        <form action="{{route('dashboard.doctor.profile.update', $doctor)}}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col gap-6 divide-y-2 divide-accent">
            @method('PATCH')
            @csrf

            {{-- initial profile section --}}
            <section class="flex flex-col justify-start py-2">
                <h2 class="text-sm text-primary font-semibold py-2">Personal Information</h2>
                <div class="w-full flex align-top items-start gap-4 divide-x-2 divide-accent">
                    <div class="w-fit">
                        <x-image_uploader
                            :image="$doctor->user->profile_image"
                            name="profile_image"
                            class="min-w-[200px] object-cover object-center text-white"
                        />
                    </div>

                    <div class="w-full flexible flex-col px-2">
                        <x-input
                            label="Name"
                            type="text"
                            name="name"
                            value="{{$doctor->user->name}}"
                            class="w-full"
                        />

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
                        {{-- Address information --}}
                        <h2 class="text-sm text-primary font-semibold py-2">Address</h2>

                        <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                            <x-input type="text" name="Nationality" label="Country" placeholder="Enter your country" icon="far fa-flag" required/>
                            <x-input type="text" name="city" label="City" placeholder="Enter your city" icon="fas fa-location-dot" required/>
                        </div>
                    </div>
                    <div class="w-full flexible flex-col">
                        {{-- Space occupant --}}
                    </div>
                </div>
            </section>

            {{-- second Career information--}}
            <section class="flex flex-col justify-start py-2">
                <div class="w-full flex align-top items-start gap-4 divide-x-2 divide-accent">

                    <div class="w-full flexible flex-col">

                        <h2 class="text-sm text-primary font-semibold py-2">Career Information</h2>

                        {{-- Career information --}}
                        <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                            <x-input type="text" name="license_number" label="License Number" placeholder="Enter your License number" icon="fas fa-key" required/>

                            <div class="w-full flex flex-col">
                                <label for="specialty">Specialty</label>
                                <select class="border-2 border-border_clr outline-none p-2 focus:border-accent transition-all ease-in-out duration-600" name="specialty_id" id="specialty">
                                    <option></option>
                                    @foreach ($specialties as $specialty)
                                        <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--years of experience, hospital and description --}}
                        <x-input type="number" name="experience" label="Years of Experience" placeholder="Your years of experience" icon="fas fa-bolt" required/>

                        <x-input type="text" name="hospital" label="Works At?" placeholder="Enter hospital name" icon="far fa-hospital" required/>

                        <x-text-area name="descriptions" label="Brief Description" placeholder="How do you like being a doctor??" rows="4" cols="30"/>
                    </div>

                    {{-- Contacts --}}
                    <div class="w-full flexible flex-col px-4">
                        <h2 class="text-sm text-primary font-semibold py-2">Contact Information</h2>

                        @foreach($contacts as $contact)
                            @php
                                $type = in_array($contact->name, ['email']) ? 'text' : 'number'
                            @endphp
                            <x-input
                                label="{{$contact->name}}"
                                :type="$type"
                                name="contacts[{{$contact->id}}]"
                                value="{{$contact->pivot->value}}"
                                class="w-full"
                            />
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Third Payment information--}}
            <section class="flex flex-col justify-start py-2">
                <h2 class="text-sm text-primary font-semibold py-2">Payment Information</h2>
                <div class="w-full flex align-top items-start gap-4">
                    <div class="w-full flexible flex-col">
                        <x-input type="number" name="consultation_fee" label="Consultation Fee (CFA)" placeholder="Enter your consultation fee" icon="fas fa-money-bill-wave" required/>

                        <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
                            <div class="w-full flex flex-col">
                                <label for="payment_type">Payment Type</label>
                                <select class="border-2 border-border_clr outline-none p-2 focus:border-accent transition-all ease-in-out duration-600" name="payment_type" id="payment_type">
                                    <option value="om">Orange Money</option>
                                    <option value="momo">MTN Momo</option>
                                </select>
                            </div>
                            <x-input type="number" name="payment_number" icon="fas fa-money-bill-1-wave" label="Payment Number" required/>
                        </div>
                    </div>
                    <div class="w-full flexible flex-col">
                    </div>
                </div>
            </section>

            {{-- update button --}}
            <x-button
                text="Update Profile"
                type="submit"
                class="btn-secondarybtn my-5"
            />
        </form>
    </main>
@endsection
