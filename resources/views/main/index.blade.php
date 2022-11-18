<x-home.container class="h-screen flex items-center">
    <div class="left-10 absolute ml-[50%] translate-x-[-50%]">
        @if($quote->count())
        @foreach($quote as $curQuote) @endforeach

        @php
            foreach($movies as $currentMovie)
        @endphp
        <img src="{{asset('storage/' . $curQuote->image)}}" alt=""  class="w-[700px] h-[386px] rounded-[10px]">
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
        @else
            @if(Config::get('app.locale') == 'en')
                <p class="text-white text-2xl">No Quotes Found!</p>
            @endif
            @if(Config::get('app.locale') == 'ge')
                <p class="text-white text-2xl">ციტატები ვერ მოიძებნა!</p>
            @endif
        @endif
    </div>


</x-home.container>

