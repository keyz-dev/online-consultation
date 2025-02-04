@extends('layout.index')
@section('title', 'Login')

@section('content')

<section class="container min-h-[60.73vh]">
    <form action="{{route("user.login")}}" method="post" class="w-full mx-auto md:min-w-[50%] md:max-w-[70%] lg:max-w-[50%] flex flex-col items-center h-auto gap-4 p-2 md:px-9 md:py-4">
        <h1 class="text-xl font-semibold">Login</h1>

        @if(session()->has('registration_success'))
            <p>{{session('registraton_success')}}</p>
        @endif
        @csrf
        <x-input type="email" name="email" label="Email" placeholder="User email" icon="far fa-envelope" required/>

        <x-input type="password" name="password" label="Password" placeholder="Enter your password" icon="far fa-eye" required/>
        <div class="w-full flex justify-between items-center">
            <div class="flex justify-between gap-2 items-center">
                <input type="checkbox" id="remember" name="remember" class="size-[16px] accent-black p-2">
                <label for="remember">Remember me</label>
            </div>
            <a href="" class="text-sm text-center hover:opacity-55 hover:underline">Forgot Password?</a>
        </div>
        <x-button type="submit" name="submit" text="Login" class="w-full my-2 btn-secondarybtn"/>
        
        <p class="text-center">Don't have an account? <a href="{{route("user.register")}}" class="text-accent hover:underline">Create One</a></p>
    </form>
</section>
@endsection