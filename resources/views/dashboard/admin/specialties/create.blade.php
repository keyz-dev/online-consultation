@extends('layout.dashboard')

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/register.js') }}" defer></script>
@endpush

@section('content')
<section class="w-full flex flex-col gap-2">
    <x-dashboard.page_url 
        page="Create_specialty"
    />
    <form action="" method="POST" class="h-full py-4 w-full justify-center flex gap-4">
        <x-dashboard.specialty_form 
            title="Create Specialty"
        />
    </form>
</section>
@endsection
