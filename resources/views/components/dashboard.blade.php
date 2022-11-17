<x-layout>
    @php $locale = Config::get('app.locale'); @endphp
    <div>
        <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
            <div
                class="flex flex-grow flex-col overflow-y-auto bg-indigo-700 pt-5"
            >

                <div class="mt-5 flex flex-1 flex-col">
                    <nav class="flex-1 space-y-1 px-2 pb-4">
                        <a
                            href="/admin/main/{{ $locale }}"
                            class="text-white group hover:bg-indigo-600 flex items-center px-2 py-2 text-sm rounded-md"
                        >
                           <x-svg.movie-dashboard />
                            {{ __("admin.dashboard") }}
                        </a>

                        <a
                            href="/admin/{{ $locale }}/quotes"
                            class="hover:bg-indigo-600 text-white group flex items-center px-2 py-2 text-sm rounded-md"
                        >
                           <x-svg.quote-dashboard />
                            {{ __("admin.allQuotes") }}
                        </a>

                        <a
                            href="/admin/{{ $locale }}/upload-movie"
                            class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        >
                           <x-svg.upload-movie />
                            {{ __("admin.uploadMovies") }}
                        </a>

                        <a
                            href="/admin/{{ $locale }}/upload-quotes"
                            class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        >
                            <!-- Heroicon name: outline/folder -->
                            <x-svg.upload-quote />
                            {{ __("admin.uploadQuotes") }}
                        </a>
                    </nav>
                </div>
                <div class="mb-28 flex justify-between w-24 mx-auto">
                    <div
                        class="{{Config::get('app.locale') == 'ge' ? 'text-neutral-900 bg-white' : 'text-white'}} border rounded-full px-2 cursor-pointer"
                    >
                        <a href="/admin/main/ge">ka</a>
                    </div>
                    <div
                        class="{{Config::get('app.locale') == 'en' ? 'text-neutral-900 bg-white' : 'text-white'}} border rounded-full px-2 cursor-pointer"
                    >
                        <a href="/admin/main/en">en</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-1 flex-col md:pl-64">
            <div
                class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow"
            >
                <div class="flex flex-1 justify-end px-4">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button
                            type="button"
                            class="rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        ></button>

                        {{ __("admin.welcome") }}:
                        <span
                            class="text-blue-500 ml-1"
                            >{{auth()->user()->name}}</span
                        >

                        <form method="POST" action="/logout" class="ml-4">
                            @csrf
                            <button type="submit" class="text">
                                {{ __("admin.logout") }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="py-6 h-screen">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
