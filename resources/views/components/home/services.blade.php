<section class="w-screen bg-primary-bg" id="services">
    <section class="container py-10 flexible flex-col">
        <x-home.sub_heading text="Our Unique Services" />
        <p class="text-center text-secondary text-sm md:w-[40%]">
            More than 200 Doctors trained doctors on DrogCine
            providing video consultancy and easy appointment
        </p>

        <section class="w-full grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 pt-5">
            @forelse ($services as $service)
                <x-home.service_card
                    :service="$service"
                />
            @empty
            <div class="w-full col-span-5 h-[100px] flex items-center justify-center text-secondary">
                There are no services available
            </div>
            @endforelse
        </section>
    </section>
</section>
