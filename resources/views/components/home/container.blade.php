<x-layout class="bg-neutral-600">

    @php $thisUrl = url()->current().'/'; $newUrlEn = str_replace('/ge/',
    '/en/', $thisUrl); $newUrlGe = str_replace('/en/', '/ge/', $thisUrl);
    @endphp

    <div {{$attributes->
        merge(['class'])}}>
        <div class="fixed top-2/4 left-12">
            <div class="ml-14">
                <a
                    href="{{ $newUrlEn }}"
                    class="{{Config::get('app.locale') == 'en' ? 'text-neutral-900 bg-white' : 'text-white'}} border-2 border-white w-14 h-14 rounded-full flex items-center justify-center  cursor-pointer"
                    >en</a
                >
                <a
                    href="{{ $newUrlGe }}"
                    class="{{Config::get('app.locale') == 'ge' ? 'text-neutral-900 bg-white' : 'text-white'}} border-2 border-white w-14 h-14 rounded-full flex items-center justify-center text-white mt-4 cursor-pointer"
                    >ka
                </a>
            </div>
        </div>
        {{ $slot }}
    </div>
</x-layout>
