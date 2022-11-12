<x-layout>
    @php $locale = Config::get('app.locale'); @endphp
    <div>
        <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
            <div
                class="flex flex-grow flex-col overflow-y-auto bg-indigo-700 pt-5"
            >
                <div class="flex flex-shrink-0 items-center px-4">
                    <img
                        class="h-8 w-auto"
                        src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=300"
                        alt="Your Company"
                    />
                </div>

                <div class="mt-5 flex flex-1 flex-col">
                    <nav class="flex-1 space-y-1 px-2 pb-4">
                        <a
                            href="/admin/main/{{ $locale }}"
                            class="text-white group hover:bg-indigo-600 flex items-center px-2 py-2 text-sm rounded-md"
                        >
                            <svg
                                class="h-6 w-6 text-white mr-3"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect
                                    x="4"
                                    y="4"
                                    width="16"
                                    height="16"
                                    rx="2"
                                />
                                <line x1="8" y1="4" x2="8" y2="20" />
                                <line x1="16" y1="4" x2="16" y2="20" />
                                <line x1="4" y1="8" x2="8" y2="8" />
                                <line x1="4" y1="16" x2="8" y2="16" />
                                <line x1="4" y1="12" x2="20" y2="12" />
                                <line x1="16" y1="8" x2="20" y2="8" />
                                <line x1="16" y1="16" x2="20" y2="16" />
                            </svg>

                            {{ __("admin.dashboard") }}
                        </a>

                        <a
                            href="/admin/{{ $locale }}/quotes"
                            class="hover:bg-indigo-600 text-white group flex items-center px-2 py-2 text-sm rounded-md"
                        >
                            <svg
                                class="h-6 w-6 text-white mr-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16"
                                />
                            </svg>
                            {{ __("admin.allQuotes") }}
                        </a>

                        <a
                            href="/admin/{{ $locale }}/upload-movie"
                            class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        >
                            <svg
                                class="h-6 w-6 text-white mr-3"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M7 18a4.6 4.4 0 0 1 0 -9h0a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"
                                />
                                <polyline points="9 15 12 12 15 15" />
                                <line x1="12" y1="12" x2="12" y2="21" />
                            </svg>
                            {{ __("admin.uploadMovies") }}
                        </a>

                        <a
                            href="/admin/{{ $locale }}/upload-quotes"
                            class="text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        >
                            <!-- Heroicon name: outline/folder -->
                            <svg
                                class="h-6 w-6 text-white mr-3"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M7 18a4.6 4.4 0 0 1 0 -9h0a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"
                                />
                                <polyline points="9 15 12 12 15 15" />
                                <line x1="12" y1="12" x2="12" y2="21" />
                            </svg>
                            {{ __("admin.uploadQuotes") }}
                        </a>
                    </nav>
                </div>
                <div class="mb-28 flex justify-between w-24 mx-auto">
                    <div
                        class="text-white border rounded-full px-2 cursor-pointer"
                    >
                        <a href="/admin/main/ge">ka</a>
                    </div>
                    <div
                        class="text-white border rounded-full px-2 cursor-pointer"
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
                <button
                    type="button"
                    class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
                >
                    <span class="sr-only">Open sidebar</span>
                    <svg
                        class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12"
                        />
                    </svg>
                </button>
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
