@extends('layout.dashboard')

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/register.js') }}" defer></script>
@endpush

@section('content')
<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url
        page="Edit_symptom"
    />
    <form action="{{route('dashboard.admin.symptom.update', $symptom)}}" method="POST" class="h-full py-4 w-full justify-center flex gap-4" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-dashboard.symptom_form
            title="Edit Symptom"
            :specialties="$specialties"
            :symptom="$symptom"
        />
    </form>
</section>
@endsection
