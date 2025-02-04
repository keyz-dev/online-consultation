<section class="flex flex-col basis-full gap-4 items-center sm:p-2" id="form-section-3">
                        
    {{-- primary contact information  and image divisibility --}}
    <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
        <div class="flex flex-col gap-4 sm:gap-3 w-full items-center justify-between">
            <x-input type="number" name="phone" label="Phone" placeholder="Enter your phone number" icon="fas fa-phone" required/>
            <x-input type="number" name="whatsapp" label="Whatsapp" placeholder="Enter your whatsapp number" icon="fab fa-whatsapp" required/>
            
            <x-input type="number" name="telegram" label="Telegram (optional)" placeholder="Enter your telegram number" icon="fab fa-telegram"/>
        </div>
        
        {{-- profile image uploader --}}
        <x-image_uploader 
            name="profile_image"
            class="min-h-[200px] h-full"
        />
    </div>

    {{-- facebook url link --}}
    <x-input type="text" name="facebook" label="Facebook Url (optional)" placeholder="Enter your facebook profile link in here" icon="fab fa-facebook"/>

    <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
        <x-input type="password" name="password" label="Password" placeholder="Enter your password" icon="far fa-eye" required/>
        <x-input type="password" name="password_confirmation" label="Confirm password" placeholder="confirm your password" icon="far fa-eye" required/>
    </div>
    
    {{-- B-om buttons --}}
    <div class="flex justify-between w-full items-center my-2">
        <a href="#form-section-1">
            <x-button text="Previous" class="border border-border_clr text-primary bg-secondary-bg hover:bg-opacity-70"/>
        </a>
        {{-- submit button --}}
        <x-button type="submit" text="Apply Now" class="btn-secondarybtn"/>
    </div>
    
    {{-- Link to the Login page --}}
    <p class="text-center">Already have an account? <a href="{{route("user.login")}}" class="text-accent hover:underline">Login</a></p>
</section>