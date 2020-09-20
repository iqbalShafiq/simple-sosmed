<div x-data="{ open: false }" class="bg-cool-gray-200 w-full">
    <div class="flex flex-col md:flex-row">
        <div class="flex justify-between px-4 py-5 items-center bg-cool-gray-300 md:bg-transparent">
            <div>
                <a href="/" class="text-cool-gray-600 font-bold text-lg">
                    {{ config('app.name') }}
                </a>
            </div>

            <div @click="open = !open" class="block md:hidden">
                <button class="focus:outline-none">
                    @auth
                    <svg viewBox="0 0 20 20" fill="currentColor" class="text-cool-gray-600 menu-alt3 w-6 h-6">
                        <path :class="{ 'hidden': open }" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd">
                        </path>

                        <path :class="{ 'hidden': !open }" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    @endauth
                </button>
            </div>
        </div>

        <div :class="{ 'hidden': !open }"
            class="md:flex md:content-between md:w-full md:items-center leading-loose px-4 py-3 md:py-0 md:border-t-0">
            <div class="flex flex-col md:flex-row md:w-full border-b border-cool-gray-500 md:border-none pb-2 md:pb-0">
                @auth
                <a href="{{ route('timeline') }}"
                    class="text-gray-500 hover:text-cool-gray-600 font-medium block mr-4 transition-colors duration-300">Timeline</a>

                <a href="#"
                    class="text-gray-500 hover:text-cool-gray-600 font-medium block transition-colors duration-300">Explore</a>
                @endauth
            </div>

            <div x-data="{ isClicked: false }" class="flex flex-col md:flex-row pt-4 md:pt-0">
                <div>
                    @auth
                    <div class="md:mr-8">
                        <div class="flex items-center">
                            <div class="mr-4 flex-shrink-0">
                                <img class="w-8 h-8 rounded-full object-cover object-center"
                                    src="{{ auth()->user()->gravatar() }}" alt="{{ auth()->user()->name }}">
                            </div>

                            <div @click="isClicked = !isClicked" class="flex-shrink-0">
                                <button
                                    class="text-gray-500 hover:text-gray-600 font-medium focus:outline-none transition-colors duration-300">
                                    {{ auth()->user()->name }}
                                </button>
                            </div>
                        </div>

                        <div :class="{ 'md:hidden': !isClicked }"
                            class="block md:absolute md:top-0 md:right-0 md:bg-cool-gray-200 md:border md:mr-5 md:mt-15 md:px-13 py-3 rounded-sm leading-loose">
                            <a href="{{ route('setting') }}"
                                class="text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300">Settings</a>
                            <a href="{{ route('show', auth()->user()->usernameOrHash) }}"
                                class="text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300">Your
                                Profile</a>
                            <a href="#"
                                class="text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300">Likes</a>
                            <a href="#"
                                class="text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300">Star</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="text-gray-500 hover:text-gray-700 font-medium block transition-colors duration-300">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    {{--
                    @else
                    <div class="flex flex-col md:flex-row">
                        <div class="md:mr-4">
                            <a href="{{ route('login') }}"
                    class="text-gray-400 hover:text-white font-medium block">Login</a>
                </div>

                <div>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="text-gray-400 hover:text-white font-medium block">Register</a>
                    @endif
                </div>
            </div>
            --}}
            @endauth
        </div>
    </div>
</div>
</div>
</div>
