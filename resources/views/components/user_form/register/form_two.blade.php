 {{-- phone and sap number pair --}}
 <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
    <div class="flex flex-col gap-8 w-full items-center justify-between">
        <x-input type="phone" name="phone" label="Phone" placeholder="Enter your phone number" icon="fas fa-phone" required />
        <x-input type="whatsapp" name="whatsapp" label="Whatsapp" icon="fab fa-whatsapp" placeholder="Enter your whatsapp number" required />
    </div>

    {{-- image uploader --}}
    <x-image_uploader name="profile_image" class="" />
 </div>
 
 {{-- document uploading --}}
 <x-input type="file" name="document" label="Medical Document (optional)" placeholder="upload a medical document" />

 {{-- password and confirmation pair --}}
 <div class="flex flex-col sm:flex-row gap-8 w-full items-center justify-between">
    <x-input type="password" name="password" label="Password" icon="far fa-eye" placeholder="Enter your password" required />
    <x-input type="password" name="password_confirmation" label="Confirm password" icon="far fa-eye" placeholder="confirm your password"
         required />
 </div>

 <div class="flex justify-between w-full items-center my-2">
     <a href="#form-section-1">
         <x-button text="Previous" class="border border-border_clr text-primary bg-secondary-bg hover:bg-opacity-70" />
     </a>
     {{-- submit button --}}
     <x-button type="submit" text="Create Account" class="btn-secondarybtn" />
 </div>

 <p class="text-center">Already have an account? <a href="{{ route('user.login') }}"
    class="text-accent hover:underline">Login</a>
</p>
