@extends('layout.dashboard')

@section('content')
<div class="grid grid-cols-4 justify-start gap-[6rem]">
    @foreach($activeDoctors as $doctors)
        <x-dashboard.doctor.available_doctor
            img_path="./storage/profile_images/ . {{ $doctors['profile'] }}" 
            status="Available"
            name='{{ $doctors["name"] }}'
            city='{{ $doctors["city"] }}'
            profile='{{ $doctors["profile"] }}'
            nationality='{{ $doctors["nationality"] }}'
        />
    @endforeach
</div>
@endsection