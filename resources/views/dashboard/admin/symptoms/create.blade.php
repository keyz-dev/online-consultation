@extends('layout.dashboard')

@section('content')
<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url 
        page="Create_symptom"
    />
    <form action="{{route('dashboard.admin.symptom.create')}}" method="POST" class="h-full py-4 w-full justify-center flex gap-4">
        @csrf
        <x-dashboard.symptom_form
            title="Create Symptom"
            :specialties="$specialties"
        />
    </form>
</section>
@endsection
