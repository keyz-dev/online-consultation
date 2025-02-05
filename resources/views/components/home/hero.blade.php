<section class="h-[80vh] max-w-[100vh] md:max-w-[100vw] w-full bg-cover" style="background-image: url({{$bg}});">
    <div class="container w-[90%] py-4 h-full flex items-center justify-center">
        <div class="w-full h-[90%] flex flex-col items-center sm:items-start justify-center gap-7 px-2 sm:px-0">
            <div class="text-[42px] flex flex-col items-center text-center sm:items-start sm:text-left sm:text-[64px] sm:leading-[70px]">
                <h1 class="font-custom text-primary">
                    <p>Our <span class="text-accent font-semibold font-hero">HealthCare</span> <br>Solutions Meet <br><span class="text-accent font-semibold font-hero">Every</span> Need</p> 
                </h1>
                <p class="text-secondary mt-10 text-sm w-[100%] md:w-[65%]">With a team of experienced  professionals and cutting-edge technology, we strive to empower individuals</p>
            </div>  
            <a href="">
                <x-button
                    text="BOOK APPOINTMENT"
                    icon="<i class='fas fa-arrow-right'></i>"
                    class="btn-primarybtn"
                />
            </a>

            {{-- Counter stats section --}}
            <div class="bg-white bg-opacity-50 p-4 pl-0 grid grid-cols-3 gap-5 rounded-[2px]">
                <div class="flex flex-col justify-center items-center">
                    <h2 class="text-3xl font-semibold text-primary font-custom">100+</h2>
                    <p class="text-[10px] text-secondary">Expert Doctor</p>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h2 class="text-3xl font-semibold text-primary font-custom">1,000+</h2>
                    <p class="text-[10px] text-secondary">Patients Served</p>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <h2 class="text-3xl font-semibold text-primary font-custom">72%</h2>
                    <p class="text-[10px] text-secondary">Satisfactory Rate</p>
                </div>
            </div>
        </div>
        <div class="h-full w-full hidden md:block" style="background-image: url()">
            <img src="{{asset('images/div.png')}}" class="h-full w-full object-contain" alt="">
        </div>
    </div>
</section>