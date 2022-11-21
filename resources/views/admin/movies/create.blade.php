<x-dashboard>
    <section>
        <h2 class="uppercase font-semibold mb-5 text-xl">{{__('admin.uploadMovies')}}</h2>
        <form action="{{route('store_movie', ['locale' => Config::get('app.locale')])}}" method="POST" class="w-1/3 mx-auto">
            @csrf
            <x-form.input name="title_eng" value="{{old('title_eng')}}">{{__('admin.movieNameEn')}}</x-form.input>
            <x-form.input name="title_geo" value="{{old('title_geo')}}">{{__('admin.movieNameGe')}}</x-form.input>
            <x-form.button>{{__('admin.upload')}}</x-button>
        </form>
    </section>
</x-dashboard>
