<x-dashboard>
    <section>
        <h2 class="uppercase font-semibold mb-5 text-xl">{{__('admin.uploadQuotes')}}</h2>
        <form action="/admin/{{Config::get('app.locale')}}/quotes" method="POST" class="w-1/3 mx-auto" enctype="multipart/form-data">
            @csrf
            <x-form.input name="body_eng" value="{{old('body_eng')}}">Quote Name</x-form.input>
            <x-form.input name="body_geo" value="{{old('body_geo')}}">ციტატის სახელი</x-form.input>
            <x-form.input name="image" value="" type="file">{{__('admin.uploadImg')}}</x-form.input>
            <select name="movies_id" required id="movies_id" class="border outline-none px-2 py-2 cursor-pointer w-full">
                <option value="option_select" disabled selected>{{__('admin.selectMovie')}}</option>
                    @foreach($movies as $movie)
                        <option value="{{$movie->id}}">{{$movie->getTranslations('title')[0]['en']}}</option>
                    @endforeach

            </select>
                @error('movies_id')
                <p class="text-red-500 text-sm mt-2">{{ $message = 'Movie is required'}}</p>
                @enderror
            <div class="mt-5">
                <x-form.button>{{__('admin.upload')}}</x-button>
            </div>
        </form>
    </section>
</x-dashboard>
