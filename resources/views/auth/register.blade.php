<x-shell>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div>
                <img class="mx-auto h-24 w-auto" src="{{ asset('img/logo.svg') }}" alt="Lancaster Software Co.">
                <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                    Create a new account
                </h2>
                <p class="mt-2 text-center text-sm leading-5 text-gray-600">
                    Or
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        sign in to an existing account
                    </a>
                </p>
            </div>
            <form class="mt-8" action="{{ route('register') }}" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                        Name
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name" autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>

                    @error('name')
                        <p role="alert" class="mt-2 text-red-700 flex items-center">
                            <svg class="mr-2 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>

                    @error('email')
                        <p role="alert" class="mt-2 text-red-700 flex items-center">
                            <svg class="mr-2 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                        Password
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password" name="password" type="password" required autocomplete="new-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">
                        Confirm Password
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>

                    @error('password')
                        <p role="alert" class="mt-2 text-red-700 flex items-center">
                            <svg class="mr-2 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        {{ __('Create account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-shell>
