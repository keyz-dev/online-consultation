@extends('layout.dashboard')

@section('content')
<div class="h-[200vh] pl-3">
    <div class="pt-3 text-5xl font-mono font-bold">
        <h1 class="capitalize">We provide <span class="text-blue-600">Medical</span> Servives</h1>
        <h1 class="capitalize">That you can <span class="text-blue-600">trust</span></h1>
    </div>

    <div class="pt-10">
        <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quam reprehenderit mollitia! Maiores tempora adipisci mollitia alias? Incidunt voluptate nulla adipisci dolorem, excepturi quibusdam voluptatum cumque, dignissimos recusandae repellat?</p>
    </div>

    <div class="pt-20 flex gap-3 font-rufus">
        <button class="bg-blue-700 text-white text-[18px] p-3 w-[15vw] h-[8vh] rounded-lg hover:bg-slate-800 hover:transition-all hover:duration-300 hover:translate-x-5 hover:cursor-pointer hover:ease-in-out flex justify-center items-center">View Appointments</button>
        <button class="bg-slate-700 text-white text-[18px] p-3 w-[15vw] h-[8vh] rounded-lg hover:bg-blue-600 hover:transition-all hover:duration-300 hover:translate-x-5 hover:cursor-pointer hover:ease-in-out flex justify-center items-center">Get in Touch</button>
    </div>

    {{-- <div class="emergency-cases pt-20 flex gap-2 pr-3">
        <x-dashboard.doctor.doctor-func 
           title="Lamet Rufus"
           subtitle="Emergency Cases"
           content=" Lorem ipsum sit amet consectetur adipiscing elit. Vivamus et erat in lacus convallis sodales."
           route=""
           bgColor="bg-slate-600"
        />
        <x-dashboard.doctor.doctor-func 
           title="Lamet Angel"
           subtitle="Emergency Cases"
           content=" Lorem ipsum sit amet consectetur adipiscing elit. Vivamus et erat in lacus convallis sodales."
           route=""
           bgColor="bg-blue-600"
        />
        <x-dashboard.doctor.doctor-func 
           title="Lamet John"
           subtitle="Emergency Cases"
           content=" Lorem ipsum sit amet consectetur adipiscing elit. Vivamus et erat in lacus convallis sodales."
           route=""
           bgColor="bg-orange-600"
        />
    </div> --}}
</div>
@endsection