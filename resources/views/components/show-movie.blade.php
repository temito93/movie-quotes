@props(['movies']) @foreach($movies as $movie)
<div class="flex justify-between border py-5 px-5 items-center mb-3">
    <img
        src="https://cdn-icons-png.flaticon.com/512/126/126806.png"
        alt=""
        width="50"
    />

    <a href="" class="truncate">
        @if(Config::get('app.locale') == 'en')
        {{$movie->getTranslations('title')[0]['en']}}
        @endif @if(Config::get('app.locale') == 'ge')
        {{$movie->getTranslations('title')[0]['ge']}}
        @endif
    </a>
    <div class="flex">
        <a
            href="/admin/{{Config::get('app.locale')}}/{{$movie->id}}/edit"
            class="mr-4 text-blue-400 hover:text-blue-900"
            >{{ __("admin.edit") }}</a
        >
        <form
            action="/admin/{{Config::get('app.locale')}}/{{$movie->id}}/delete"
            method="POST"
        >
            @csrf @method('DELETE') @if(Config::get('app.locale') == 'en')
            <button
                type="submit"
                class="text-red-500 hover:text-red-900"
                onclick="return confirm('Are you sure to delete?')"
            >
                {{ __("admin.delete") }}
            </button>
            @endif @if(Config::get('app.locale') == 'ge')
            <button
                type="submit"
                class="text-red-500 hover:text-red-900"
                onclick="return confirm('დარწმუნებული ხართ რომ გსურთ წაშლა?')"
            >
                {{ __("admin.delete") }}
            </button>
            @endif
        </form>
    </div>
</div>
@endforeach
