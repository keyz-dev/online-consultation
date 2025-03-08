@extends('layout.dashboard')

@section('content')
<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url index='doctor'
        page="Dashboard"
    />
    <div class="w-full flex items-center justify-start">
        <h1 class="text-[25px] text-primary font-medium">Dashboard</h1>
    </div>

    <main class="w-full h-full grid md:grid-cols-3 gap-4 p-2 border-2 border-border_clr">
        <section class="col-span-2 w-full bg-white">
            <div>
                section 1
            </div>
        </section>
        <section class="bg-white w-full">
            <div>
                section 2
            </div>
        </section>
    </main>
</section>
@endsection
