@extends('layouts.modal')

@section('content')
<div class="container">
    <div class="w-full rounded-lg bg-cool-gray-100 p-4 shadow-md">
        <img class="w-full object-cover object-center h-96 rounded-lg mb-5"
            src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80">

        <div class="flex flex-col justify-center">
            <div class="text-3xl md:text-5xl font-semibold text-center text-cool-gray-800 mb-4">
                Let's Find Friends on Social Media!
            </div>

            <div class="flex justify-center">
                @auth
                <a class="font-semibold bg-cool-gray-700 hover:bg-cool-gray-200 hover:shadow-md focus:outline-none transition-colors duration-300 px-6 py-4 text-xl md:text-3xl text-cool-gray-200 hover:text-cool-gray-700 rounded-lg mx-4"
                    href="{{ route('timeline') }}">
                    Check your timeline
                </a>
                @else
                <a class="w-1/2 text-center font-semibold bg-blue-700 hover:bg-blue-200 hover:shadow-md focus:outline-none transition-colors duration-300 px-6 py-4 text-xl md:text-3xl text-cool-gray-200 hover:text-cool-gray-700 rounded-lg mx-4"
                    href="{{ route('login') }}">
                    Login
                </a>
                <a class="w-1/2 text-center font-semibold bg-yellow-500 hover:bg-yellow-200 hover:shadow-md focus:outline-none transition-colors duration-300 px-6 py-4 text-xl md:text-3xl text-cool-gray-200 hover:text-cool-gray-700 rounded-lg mx-4"
                    href="{{ route('register') }}">
                    Register
                </a>
                @endauth
            </div>
        </div>

    </div>
</div>
@endsection
