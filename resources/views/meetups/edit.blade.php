<x-shell>
    <form method="POST" action="{{ route('meetups.update', $meetup) }}" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        @csrf
        @method('PATCH')

        <h2 class="text-3xl font-bold leading-tight text-gray-900">
            Edit meetup
        </h2>

        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div id="alert" role="alert" class="mt-6 rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-green-800">
                            {{ \Illuminate\Support\Facades\Session::get('success') }}
                        </p>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" onclick="document.getElementById('alert').remove()" class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150" aria-label="Dismiss">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

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
                    <input id="api_url" name="api_url" value="{{ $meetup->api_url }}" required class="flex-1 form-input block w-full min-w-0 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
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

                <span class="mr-auto inline-flex">
                    <button type="button" onclick="document.getElementById('delete').submit()" class="inline-flex items-center -ml-4 px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-gray-900 hover:text-red-700 focus:text-red-700 focus:outline-none focus:shadow-outline-red active:text-red-700 transition ease-in-out duration-150">
                        <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        Delete
                    </button>
                </span>
            </div>
        </div>
    </form>

    <form hidden id="delete" method="POST" action="{{ route('meetups.destroy', $meetup) }}">
        @csrf
        @method('DELETE')
    </form>
</x-shell>
