@extends('layout.dashboard')

@section('content')
<div class="h-[245vh] pl-3">
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

    <div class="emergency-cases pt-20 flex gap-2 pr-3">
        <x-dashboard.doctor.doctor-func
            title="Lamet Rufus"
            subtitle="Emergency Cases"
            content=" Lorem ipsum sit amet consectetur adipiscing elit. Vivamus et erat in lacus convallis sodales."
            route="/"
            bgColor="bg-slate-600" />
        <x-dashboard.doctor.doctor-func
            title="Lamet Angel"
            subtitle="Doctor's TimeTable"
            content=" Lorem ipsum sit amet consectetur adipiscing elit. Vivamus et erat in lacus convallis sodales."
            route="/"
            bgColor="bg-blue-600" />
        <x-dashboard.doctor.doctor-func
            title="Openly Hours"
            subtitle="Emergency Cases"
            content=" Lorem ipsum sit amet consectetur adipiscing elit. Vivamus et erat in lacus convallis sodales."
            route="/"
            bgColor="bg-orange-600" />
    </div>
    <div class="h-[70vh] mt-10 mr-3">
        <div class="flex flex-col justify-center items-center pt-4 gap-10">
            <div class="text-3xl">We Are Always Ready to Help You & Your Family</div>
            <div class="text-slate-400">Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</div>
            <div class="flex justify-between items-center gap-[2rem]">
                <x-dashboard.doctor.medical-type
                    value="1"
                    title="Emergency Help"
                    img=""
                    description="Maecenas mi quam vulputate." />
                <div class="text-3xl text-slate-600">.........</div>

                <x-dashboard.doctor.medical-type
                    value="2"
                    title="Enriched Pharmecy"
                    img=""
                    description="Maecenas mi quam vulputate." />
                <div class="text-3xl text-slate-600">.........</div>


                <x-dashboard.doctor.medical-type
                    value="3"
                    title="Medical Treatment"
                    img=""
                    description="Maecenas mi quam vulputate." />
            </div>
        </div>
    </div>
    {{-- The footer --}}

    <div class="h-[50vh] mr-3 bg-secondary-bg mt-[4rem] flex justify-between items-center gap-2">
        <div class="w-[300px] text-[18px] h-[35vh] rounded-lg bg-slate-0">
            <ul class="flex flex-col list-none justify-center items-start pl-6 pt-3">
                <li><a href="" class="hover:text-orange-500">Login</a></li>
                <li><a href="" class="hover:text-orange-500">about</a></li>
                <li><a href="" class="hover:text-orange-500">visit</a></li>
                <li><a href="" class="hover:text-orange-500">Logout</a></li>
            </ul>
        </div>
        <div class="w-[300px] text-[18px] h-[35vh] rounded-lg">
            <ul class="flex flex-col list-none justify-center items-start pl-6 pt-3">
                <li><a href="" class="hover:text-orange-500">Link 1</a></li>
                <li><a href="" class="hover:text-orange-500">Link 2</a></li>
                <li><a href="" class="hover:text-orange-500">Link 3</a></li>
                <li><a href="" class="hover:text-orange-500">Link 4</a></li>
            </ul>
        </div>
        <div class="w-[300px] text-[18px] h-[35vh] rounded-lg">
            <ul class="flex flex-col list-none justify-center items-start pl-6 pt-3">
                <li><a href="" class="hover:text-orange-500">Back 1</a></li>
                <li><a href="" class="hover:text-orange-500">Back 2</a></li>
                <li><a href="" class="hover:text-orange-500">Back 3</a></li>
                <li><a href="" class="hover:text-orange-500">Back 4</a></li>
            </ul>
        </div>
    </div>

</div>
@endsection