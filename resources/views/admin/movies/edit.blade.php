<x-dashboard>
    <a href="{{route('dashboard', ['locale' => Config::get('app.locale')])}}">{{
        __("admin.back")
    }}</a>
    <form
        action="/admin/{{Config::get('app.locale')}}/{{$movies->id}}/update"
        method="POST"
        class="w-1/3 mx-auto"
    >
        @csrf @method('PATCH')

        <div>
            <x-form.input
                name="title_eng"
                value="{{$movies->getTranslations('title')[0]['en']}}"
                >{{ __("admin.newMovieNameEn") }}</x-form.input
            >
            <x-form.input
                name="title_geo"
                value="{{$movies->getTranslations('title')[0]['ge']}}"
                >{{ __("admin.newMovieNameGe") }}</x-form.input
            >
        </div>

        <x-form.button>{{ __("admin.update") }}</x-form.button>
    </form>
</x-dashboard>
