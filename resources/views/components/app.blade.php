<x-shell>
    <nav class="relative bg-white">
        <div class="flex justify-between items-center px-4 py-6 sm:px-6 md:justify-start md:space-x-10">
            <div class="hidden md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
                @auth
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="whitespace-no-wrap text-base leading-6 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <span class="inline-flex rounded-md shadow-sm">
                        <a href="{{ route('home') }}" class="whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                            Home
                        </a>
                    </span>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="whitespace-no-wrap text-base leading-6 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                        Sign in
                    </a>
                    <span class="inline-flex rounded-md shadow-sm">
                        <a href="{{ route('register') }}" class="whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                            Sign up
                        </a>
                    </span>
                @endguest
            </div>
        </div>
    </nav>

    {{ $slot }}
</x-shell>
