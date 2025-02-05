@extends('layout.dashboard')

@section('content')
<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url index='admin'
        page="Edit Q and A block"
    />
    <form action="{{route('dashboard.admin.q_and_a.update', $q_and_a)}}" method="POST" class="h-full py-4 w-full justify-center flex gap-4">
        @method('PATCH')
        <x-dashboard.q_and_a_form
            title="Edit Q and A"
            :q="$q_and_a"
        />
    </form>
</section>
@endsection
