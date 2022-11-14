<x-home.container class="h-screen">

    @foreach($quote as $curQuote) @endforeach

    @php
        $filteredMovie = $movies->where('id', $curQuote->movie_id);
        foreach($filteredMovie as $currentMovie)
    @endphp


    <div class="left-10 absolute ml-[50%] translate-x-[-50%]">
            <img src="{{asset('storage/' . $curQuote->image)}}" alt="" width="700" height="386" class="rounded-[10px]">
            <p class="text-white text-5xl mt-16 text-center">”
                @if(Config::get('app.locale') == 'en')
                    {{$curQuote->getTranslations('body')[0]['en']}}
                @endif

                @if(Config::get('app.locale') == 'ge')
                    {{$curQuote->getTranslations('body')[0]['ge']}}
                @endif
            ”</p>
            <p class="text-center text-white text-5xl underline mt-28">
                <a href="/home/{{Config::get('app.locale')}}/movie/{{$currentMovie->id}}">
                    @if(Config::get('app.locale') == 'en')
                        {{$currentMovie->getTranslations('title')[0]['en']}}
                    @endif

                    @if(Config::get('app.locale') == 'ge')
                        {{$currentMovie->getTranslations('title')[0]['ge']}}
                    @endif
                </a>
            </p>
    </div>
</x-home.container>

