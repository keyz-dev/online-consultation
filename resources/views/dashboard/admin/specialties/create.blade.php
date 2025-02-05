@extends('layout.dashboard')

@section('content')
<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url index='admin'
        page="Create_specialty"
    />
    <form action="{{route('dashboard.admin.specialty.create')}}" method="POST" class="h-full py-4 w-full justify-center flex gap-4">
        @csrf
        <x-dashboard.specialty_form
            title="Create Specialty"
        />
    </form>
</section>
@endsection
