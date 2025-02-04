<section class="flex basis-full flex-col gap-4 items-center sm:p-2" id="form-section-1">
    <x-input type="text" name="name" label="Full Name" placeholder="User name" icon="far fa-user" required/>
    <x-input type="email" name="email" label="Email" placeholder="User email" icon="far fa-envelope" required/>

    <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
        <x-input type="text" name="Nationality" label="Country" placeholder="Enter your country" icon="far fa-flag" required/>
        <x-input type="text" name="city" label="City" placeholder="Enter your city" icon="fas fa-location-dot" required/>
    </div>
    
    {{-- Licence number and specialty --}}
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
    
    {{-- Gender and DOB --}}
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
        <a href="{{route("home.index")}}">
            <x-button text="Cancel" class="border border-border_clr text-primary bg-secondary-bg hover:bg-opacity-70"/>
        </a>
        <a href="#form-section-2">
            <x-button text="Next" class="btn-secondarybtn"/>
        </a>
    </div>

    <p class="text-center">Already have an account? <a href="{{route("user.login")}}" class="text-accent hover:underline">Login</a></p>
</section>