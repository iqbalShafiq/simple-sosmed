<div class="lg:h-screen lg:border-r border-cool-gray-300 w-full mb-6 md:mb-0" x-data="{ navOpen: false }">
    @auth
    <div class="border-b border-cool-gray-300 p-4 bg-cool-gray-100 cursor-pointer lg:cursor-default"
        @click="navOpen = !navOpen">
        <div class="flex">
            <div class="flex-shrink-0 mr-3">
                <img class="w-16 h-16 object-cover object-center rounded-full" src="{{ auth()->user()->gravatar() }}">
            </div>

            <div class="flex-shrink-0">
                <div class="font-semibold text-gray-600">
                    {{ auth()->user()->name }}
                </div>

                <div class="font-semibold text-sm text-cool-gray-400">
                    {{ auth()->user()->description }}
                </div>
            </div>
        </div>
    </div>

    <div class="text-lg font-semibold py-4 leading-loose border-b rounded-b-lg lg:border-b-0 lg:rounded-b-0"
        :class="{ 'hidden lg:block' : !navOpen }">
        <a href="{{ route('timeline') }}"
            class="px-5 py-1 md:px-4 text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300 hover:bg-cool-gray-200">Timeline
        </a>
        <a href="{{ route('setting') }}"
            class="px-5 py-1 md:px-4 text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300 hover:bg-cool-gray-200">Settings</a>
        <a href="{{ route('show', auth()->user()->usernameOrHash) }}"
            class="px-5 py-1 md:px-4 text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300 hover:bg-cool-gray-200">Your
            Profile</a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="px-5 py-1 md:px-4 text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300 hover:bg-cool-gray-200">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    @endauth

    @guest
    <div class="py-4 lg:pr-28 leading-loose border-b rounded-b-lg lg:border-b-0 lg:rounded-b-0 visible">
        <a href="/"
            class="px-5 md:px-4 text-lg text-gray-500 hover:text-gray-800 font-bold block transition-colors duration-300 hover:bg-cool-gray-200">{{ config('app.name') }}
        </a>
        <a href="{{ route('login')}}"
            class="px-5 md:px-4 text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300 hover:bg-cool-gray-200">Login</a>
        <a href="{{ route('register')}}"
            class="px-5 md:px-4 text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300 hover:bg-cool-gray-200">Register</a>
    </div>
    @endguest
</div>
