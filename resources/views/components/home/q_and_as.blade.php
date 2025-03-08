@push('styles')
    <style>
        .question_btn svg{
            flex-shrink: 0; /*prevent size distortion */
            fill: #535455d5;
            transition: 200ms ease;
        }

        .question_btn.rotate svg:last-child{
            rotate: 180deg !important;
        }

        .answer_div{
            transition: 300ms ease-in-out;
            display: grid;
            grid-template-rows: 0fr;
            > div{
                overflow: hidden;
            }
        }
        .answer_div.show{
            grid-template-rows: 1fr;
        }

    </style>
@endpush

<section class="w-screen bg-slate-100">
    <section class="container py-10 flexible flex-col gap-5">
        <x-home.sub_heading text="FAQs" />
        <p class="text-center text-secondary text-sm md:w-[40%]">
            Most of our users ask these questions
        </p>

        <section class="w-full grid gap-4 grid-cols-1 md:grid-cols-2 pt-5">
            @forelse ($qs as $q)
                <x-home.q_and_a_item
                    :q="$q"
                    description="hide"
                />
            @empty
            <div class="w-full col-span-5 h-[100px] flex items-center justify-center text-secondary">
                There are no Questions to answer available
            </div>
            @endforelse
        </section>
    </section>
</section>

<script>
    const toggleSubMenu = (button) =>{
        console.log(button.nextElementSibling)
        button.nextElementSibling.classList.toggle('show');
        button.classList.toggle('rotate');
    }
</script>
