@extends('layout.dashboard')

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/register.js') }}" defer></script>
@endpush

@section('content')
<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url index='admin'
        page="Create_symptom"
    />
    <form action="{{route('dashboard.admin.symptom.create')}}" method="POST" class="h-full py-4 w-full justify-center flex gap-4" enctype="multipart/form-data">
        @csrf
        <x-dashboard.symptom_form
            title="Create Symptom"
            :specialties="$specialties"
        />
    </form>
</section>
@endsection
