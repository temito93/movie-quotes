<x-dashboard>
    <section class="pb-10">
        <a href="/admin/{{Config::get('app.locale')}}/quotes">{{
            __("admin.back")
        }}</a>
        <form
            action="/admin/{{Config::get('app.locale')}}/{{$quote->id}}/update_quote"
            method="POST"
            class="w-1/3 mx-auto"
            enctype="multipart/form-data"
        >
            @csrf @method('PATCH')
            <x-form.input
                name="body_eng"
                value="{{$quote->getTranslations('body')[0]['en']}}"
                >Quote Name</x-form.input
            >
            <x-form.input
                name="body_geo"
                value="{{$quote->getTranslations('body')[0]['ge']}}"
                >ციტატის სახელი</x-form.input
            >

            @php foreach($movie_name as $current_movie)@endphp
            <p class="mb-3">{{ __("admin.movieName") }}</p>
            <select
                name="movies_id"
                id="movies_id"
                class="border outline-none px-2 py-2 cursor-pointer mb-5 w-full"
            >
                <option value="{{$current_movie->id}}" selected>
                    {{ ucwords($current_movie->getTranslations('title')[0]['en']) }}
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
