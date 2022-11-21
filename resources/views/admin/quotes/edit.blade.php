<x-dashboard>
    <section class="pb-10">
        <a
            href="{{route('show_quotes', ['locale' => Config::get('app.locale')])}}"
            >{{ __("admin.back") }}</a
        >
        <form
            action="{{route('update_quote', ['locale' => Config::get('app.locale'), 'quote' => $quote->id])}}"
            method="POST"
            class="w-1/3 mx-auto"
            enctype="multipart/form-data"
        >
            @csrf @method('PATCH')
            <x-form.input
                name="body_eng"
                value="{{$quote->getTranslations('body')[0]['en']}}"
                >{{ __("admin.newQuoteNameEn") }}</x-form.input
            >
            <x-form.input
                name="body_geo"
                value="{{$quote->getTranslations('body')[0]['ge']}}"
                >{{ __("admin.newQuoteNameGe") }}</x-form.input
            >

            @php foreach($movie_name as $current_movie)@endphp
            <p class="mb-3">{{ __("admin.movieName") }}</p>
            <select
                name="movie_id"
                id="movie_id"
                class="border outline-none px-2 py-2 cursor-pointer mb-5 w-full"
            >
                <option value="{{$current_movie->id}}" selected>
                    @if(Config::get('app.locale') == 'en')
                    {{ ucwords($current_movie->getTranslations('title')[0]['en']) }}
                    @endif @if(Config::get('app.locale') == 'ge')
                    {{ ucwords($current_movie->getTranslations('title')[0]['ge']) }}
                    @endif
                </option>
                @foreach($movies as $movie)
                <option value="{{$movie->id}}">
                    {{$movie->getTranslations('title')[0]['en']}}
                </option>
                @endforeach
            </select>
            <x-form.input name="image" value="" type="file">{{
                __("admin.uploadImg")
            }}</x-form.input>
            <img
                src="{{asset('storage/' . $quote->image)}}"
                alt=""
                class="mb-5"
            />

            <x-form.button>{{ __("admin.update") }}</x-form.button>
        </form>
    </section>
</x-dashboard>
