<x-shell>
    <form method="POST" action="{{ route('meetups.store') }}" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        @csrf

        <h2 class="text-3xl font-bold leading-tight text-gray-900">
            Add meetup
        </h2>

        <div class="mt-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                API Settings
            </h3>
            <p class="mt-1 text-sm leading-5 text-gray-500">
                This information will be used to fetch data from the meetup's API.
            </p>
        </div>
        <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="api_url" class="block text-sm font-medium leading-5 text-gray-700">
                    URL
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <input id="api_url" name="api_url" value="{{ old('api_url') }}" required class="flex-1 form-input block w-full min-w-0 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
                @error('api_url')
                    <p role="alert" class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex flex-row-reverse justify-start">
                <span class="ml-3 inline-flex rounded-md shadow-sm">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out">
                        Save
                    </button>
                </span>
                <span class="inline-flex rounded-md shadow-sm">
                    <a href="{{ route('admin') }}" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                        Cancel
                    </a>
                </span>
            </div>
        </div>
    </form>
</x-shell>
