@extends('layout.dashboard')

@section('content')
<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url index='admin'
        page="Create Q and A block"
    />
    <form action="{{route('dashboard.admin.q_and_a.create')}}" method="POST" class="h-full py-4 w-full justify-center flex gap-4">
        @csrf
        <x-dashboard.q_and_a_form
            title="Create Q and A"
        />
    </form>
</section>
@endsection
