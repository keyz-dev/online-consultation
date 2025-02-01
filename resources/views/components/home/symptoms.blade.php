<section class="w-screen bg-secondary-bg" id="symptoms">
    <section class="container py-10 flexible flex-col">
        <x-home.sub_heading 
            text="Common Symptoms" 
        />
        <p class="text-center text-secondary text-sm md:w-[40%]">
            Talk with experienced doctors about your symptoms instantly through video consulation
        </p>

        {{-- To be made into a sliding carousel --}}
        <section class="w-full grid gap-4 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @forelse ($symptoms as $symptom)
            {{-- clicking on a card should automatically send a search query for doctors with that symptom, and then redirect to the doctors page  --}}
                <x-home.symptom_card
                    :symptom="$symptom"
                />
            @empty
            <div class="w-full col-span-5 h-[100px] flex items-center justify-center text-secondary">
                No Symptoms Found
            </div>
            @endforelse
        </section>
        <div class="flex w-full items-center justify-center py-6">
            <a href="" class="flex items-center gap-1 border border-line_clr">
                <x-button 
                    text="VIEW MORE"
                    class="text-[12px] font-semibold text-secondary px-4 py-2 min-w-fit min-h-fit hover:bg-accent hover:text-white"
                >
                    <i class="fas fa-chevron-right"></i>
                </x-button>
            </a>
        </div>
    </section>
</section>
