<x-shell>
    <div class="relative px-4 sm:px-6 lg:px-8 py-8 max-w-5xl mx-auto">
        <div class="text-lg max-w-prose mx-auto mb-6">
            <img src="{{ asset('img/logo-lg.png') }}" alt="TechLancaster" class="w-full max-w-md mx-auto">
            <p class="mt-4 text-center text-xl text-gray-500 leading-8">Supporting the tech community in Lancaster.</p>
        </div>
        <div class="prose prose-lg text-gray-500 mx-auto">
            <p>TechLancaster started as a simple local meetup, a safe place for like-minded tech people to come together and geek out. We've strived to be open, welcoming, and supportive to everyone in the community, regardless of their interest or background.</p>
            <p>The past year has seen amazing growth in Lancaster's tech scene, and we believe this is only the beginning. As members of the tech community, we want to support this growth and ensure the community remains a healthy, open, and welcoming place for all its current and future members.</p>
        </div>

        <div class="pt-12 sm:pt-16 lg:pt-20">
            <h2 class="text-3xl leading-9 font-extrabold text-gray-900">
                Upcoming meetings
            </h2>
            <ol class="mt-6 border-t-2 border-gray-100 pt-10">
                @foreach($nextMeetings as $meeting)
                    <li @if(!$loop->first) class="mt-12" @endif>
                        <div class="text-xl leading-6 font-medium text-gray-900">
                            {{ $meeting->title }}
                            <a href="#meetup-{{ $meeting->meetup->id }}" class="ml-2 text-gray-500">
                                {{ $meeting->meetup->name }}
                            </a>
                        </div>
                        <div class="mt-2">
                            <p class="text-base leading-6 text-gray-700">
                                {{ $meeting->description }}
                            </p>
                        </div>
                        <a href="{{ route('icals.meetups.next', $meeting->meetup) }}" title="Add to calendar" class="mt-2 text-base leading-6 text-gray-500 inline-flex items-center">
                            <svg class="h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Happening in {{ $meeting->time->diffForHumans() }} on {{ $meeting->time->format('F jS \a\t g:ia') }}
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>

        <div class="pt-12 sm:pt-16 lg:pt-20">
            <h2 class="text-3xl leading-9 font-extrabold text-gray-900">
                All of our communities
            </h2>
            <ul class="mt-6 border-t-2 border-gray-100 pt-10 grid grid-cols-1 gap-6 md:grid-cols-2">
                @foreach ($meetups as $meetup)
                    <li id="meetup-{{ $meetup->id }}" class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow">
                        <div class="flex-1 flex flex-col p-8">
                            <h3 class="text-gray-900 text-xl leading-5 font-medium">{{ $meetup->name }}</h3>
                            <p class="mt-4 text-left">{{ $meetup->description }}</p>
                        </div>
                        <div class="border-t border-gray-200">
                            <div class="-mt-px flex">
                                @if ($meetup->website)
                                    <div class="w-0 flex-1 flex @if ($meetup->meetup) border-r border-gray-200 @endif">
                                        <a href="{{ $meetup->website }}" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-base leading-5 text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150">
                                            <svg class="w-6 h-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="ml-3">Website</span>
                                        </a>
                                    </div>
                                @endif
                                @if ($meetup->meetup)
                                    <div class="-ml-px w-0 flex-1 flex">
                                        <a href="{{ $meetup->meetup }}" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm leading-5 text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150">
                                            <img src="{{ asset('img/meetup.svg') }}" alt="Meetup" class="h-8">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-shell>
