<x-dashboard>
    <section>
        <h2 class="uppercase font-semibold mb-5 text-xl">{{__('admin.uploadMovies')}}</h2>
        <form action="/admin/{{Config::get('app.locale')}}/movies" method="POST" class="w-1/3 mx-auto">
            @csrf
            <x-form.input name="title_eng" value="{{old('title_eng')}}">Movie Name</x-form.input>
            <x-form.input name="title_geo" value="{{old('title_geo')}}">ფილმის სახელი</x-form.input>
            <x-form.button>{{__('admin.upload')}}</x-button>
        </form>
    </section>
</x-dashboard>
