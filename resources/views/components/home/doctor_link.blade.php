<section class="w-screen bg-pending-bg">
   <section class="container py-10 flex items-center gap-8 flex-col sm:flex-row justify-center">

        <a href="{{route('home.doctors')}}">
            <x-button 
                text="See Doctors"
                class="border border-accent hover:opacity-50"
            />
        </a>
        <hr class="h-[100px] w-[2px] bg-white hidden sm:block">

        <div class="flex flex-col gap-5 items-center">
            <h1 class="text-center text-3xl text-primary font-custom font-bold">Become Our Doctor</h1>
            <p class="text-center text-secondary text-sm text-wrap md:max-w-[450px]">
            We're in desperate need of medical practitioners to help us spread good health to the ends of the earth
            </p>
        </div>

        <hr class="h-[100px] w-[2px] bg-white hidden sm:block">
        <a href="{{route('doctor.register')}}">
            <x-button 
                text="Apply Now"
                class="btn-secondarybtn"
            />
        </a>
    
    </section>
</section>
