<section class="w-screen bg-pending-bg">

   <section class="container py-10 flex items-center justify-center gap-8 sm:gap-20 flex-col sm:flex-row">
    <div class="flexible flex-col gap-5 ">
        <h1 class="text-center text-3xl text-primary font-custom font-bold">Become Our Doctor</h1>
        <p class="text-center text-secondary text-sm md:w-[60%]">
           We're in desperate need of medical practitioners to help us spread good health to the ends of the earth
        </p>
    </div>

    <hr class="h-[100px] w-[2px] bg-white hidden sm:block">

    <div class="flex-1">
        <a href="{{route('doctor.register')}}">
            <x-button 
                text="Apply Now"
                class="btn-secondarybtn"
            />
        </a>
    </div>
</section>
</section>
