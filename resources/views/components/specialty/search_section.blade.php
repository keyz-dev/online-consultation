
<style>
    .search_form svg{
        fill: rgb(102, 100, 100);
    }
</style>
<div class="container py-4 flexible w-full flexible justify-center">
    {{-- The search input --}}
    <form class="search_form" action="" method="POST">
        {{-- iclass is for the input within the container --}}
        <x-search 
            name="specialty_search"
            placeholder="Search for a specialty"
            class="border-2 border-border_clr"
            iclass="border-none outline-none min-w-[280px] sm:min-w-[320px] placeholder:text-slate-400 placeholder:text-[13px]"
        />
    </form>
</div>
