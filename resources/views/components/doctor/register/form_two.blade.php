<section class="flex flex-col basis-full gap-4 items-center sm:p-2" id="form-section-2">

    {{-- Years of experience and consultation fee --}}
    <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
        <x-input type="number" name="experience" label="Years of Experience" placeholder="Your years of experience" icon="fas fa-bolt" required/>
        <x-input type="number" name="consultation_fee" label="Consultation Fee (CFA)" placeholder="Enter your consultation fee" icon="fas fa-money-bill-wave" required/>
    </div>

    {{-- Payment type and number --}}
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
    
    {{-- Institution of current service --}}
    <x-input type="text" name="hospital" label="Working At?" placeholder="Enter hospital name" icon="far fa-hospital" required/>
    
    {{-- Description --}}
    <x-text-area name="descriptions" label="Brief Description" placeholder="How do you like being a doctor??" rows="4" cols="30"/>
    
    {{-- Link Buttons --}}
    <div class="flex justify-between w-full items-center my-2">
        <a href="#form-section-1">
            <x-button text="Previous" class="border border-border_clr text-primary bg-secondary-bg hover:bg-opacity-70"/>
        </a>
        <a href="#form-section-3">
            <x-button text="Next" class="btn-secondarybtn"/>
        </a>
    </div>

    {{-- Link to login page --}}
    <p class="text-center">Already have an account? <a href="{{route("user.login")}}" class="text-accent hover:underline">Login</a></p>
</section>
