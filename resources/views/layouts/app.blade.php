@extends('layouts.base')

@section('body')
<div class="block lg:flex mb-3">
    <div class="block lg:fixed lg:w-1/4">
        <livewire:navigation.navbar />
    </div>

    <div class="lg:mx-1/4 w-full">
        @yield('content')
    </div>

    <div class="lg:h-screen block lg:fixed lg:w-1/4 py-4 border-l right-0">
        <div class="border-b border-gray-300"></div>

        <div class="text-sm text-cool-gray-600 mt-2 px-2">
            &copy; Build with love by me :D
        </div>
    </div>
</div>
@endsection
