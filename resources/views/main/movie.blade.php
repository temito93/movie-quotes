<x-home.container>
    @php
        foreach($movie as $currentMovie)
    @endphp




    <div class="ml-[40%] translate-x-[-40%] mt-20">
        <p class=" text-white text-5xl mb-20">
                @if(Config::get('app.locale') == 'en')
                    {{$currentMovie->getTranslations('title')[0]['en']}}
                @endif

                @if(Config::get('app.locale') == 'ge')
                    {{$currentMovie->getTranslations('title')[0]['ge']}}
                @endif
        </p>
        @foreach($quotes as $quote)
        <div class="w-[748px] h-[533px] bg-white border border-black rounded-[10px] mb-16">
            <img src="{{asset('storage/' . $quote->image)}}" alt=""  class="rounded-[10px] w-full h-[414px]">
            <p class="text-movie-text text-4xl mt-8 ml-5">”
                @if(Config::get('app.locale') == 'en')
                    {{$quote->getTranslations('body')[0]['en']}}
                @endif

                @if(Config::get('app.locale') == 'ge')
                    {{$quote->getTranslations('body')[0]['ge']}}
                @endif
            ”</p>
        </div>
        @endforeach

    </div>



</x-home.container>
