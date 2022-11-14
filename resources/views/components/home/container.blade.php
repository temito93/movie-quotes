<x-layout>
    <div {{$attributes->merge(['class' => "bg-neutral-600  flex items-center"])}}>
           <div>

                <div class="ml-14">
                    <a href="{{route('en')}}" class="{{Config::get('app.locale') == 'en' ? 'text-white' : 'text-neutral-900 bg-white'}} border-2 border-white w-14 h-14 rounded-full flex items-center justify-center  cursor-pointer">en</a>
                    <a href="{{route('ge')}}" class="{{Config::get('app.locale') == 'ge' ? 'text-white' : 'text-neutral-900 bg-white'}} border-2 border-white w-14 h-14 rounded-full flex items-center justify-center text-white mt-4 cursor-pointer">ka  </a>
                </div>
           </div>
           {{$slot}}

    </div>
</x-layout>
