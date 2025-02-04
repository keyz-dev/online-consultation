{{-- name and email inputs --}}
<x-input type="text" name="name" label="Full Name" placeholder="User name" icon="far fa-user" required/>
<x-input type="email" name="email" icon="far fa-envelope" label="Email" placeholder="User email" required/>

{{-- Nationality and city inputs --}}
<div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
    <x-input type="text" name="Nationality" label="Country" icon="far fa-flag" placeholder="Enter your country" required/>
    <x-input type="text" name="city" icon="fas fa-location-dot" label="City" placeholder="Enter your city" required/>
</div>

{{-- Gender and Dob --}}
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

{{-- Botttom navigator buttons --}}
<div class="flex justify-between w-full items-center my-2">
    <a href="">
        <x-button text="Cancel" class="border border-border_clr text-primary bg-secondary-bg hover:bg-opacity-70"/>
    </a>
    <a href="#form-section-2">
        <x-button text="Next" class="btn-secondarybtn"/>
    </a>
</div>

<p class="text-center">Already have an account? <a href="{{route("user.login")}}" class="text-accent hover:underline">Login</a></p>