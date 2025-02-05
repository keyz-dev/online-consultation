<section class="w-screen bg-slate-100" if="specialties">
    <section class="container py-10 flexible flex-col gap-5">
        <x-home.sub_heading text="Our Specialties" />
        <p class="text-center text-secondary text-sm md:w-[40%]">
            More than 200 Doctors trained doctors on DrogCine
            providing video consultancy and easy appointment
        </p>

        <div class="flex w-full items-center justify-between">
            <h2 class="text-lg font-medium">
                Topping Specialties
            </h2>
            <a href="{{route('home.specialties')}}" class="flex items-center gap-1 border border-line_clr">
                <x-button 
                    text="VIEW MORE"
                    class="text-[12px] font-semibold text-secondary px-4 py-2 min-w-fit min-h-fit hover:bg-accent hover:text-white"
                >
                    <i class="fas fa-chevron-right"></i>
                </x-button>
            </a>
        </div>

        {{-- To be made into a sliding carousel --}}
        <section class="w-full grid gap-4 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @forelse ($specialties as $specialty)
            {{-- clicking on a card should automatically send a search query for doctors with that specialty, and then redirect to the doctors page  --}}
                <x-specialty.specialty_card
                    :specialty="$specialty"
                    description="hide"
                />
            @empty
            <div class="w-full col-span-5 h-[100px] flex items-center justify-center text-secondary">
                There are no specialties available
            </div>
            @endforelse
        </section>
    </section>
</section>
