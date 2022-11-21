@props(['quotes']) @foreach($quotes as $quote)
<div class="flex justify-between border py-2 px-4 items-center mb-3">
    <img src="{{asset('storage/' . $quote->image)}}" alt="" width="100" />
    <a href="">
        @if(Config::get('app.locale') == 'en')
        {{$quote->getTranslations('body')[0]['en']}}
        @endif @if(Config::get('app.locale') == 'ge')
        {{$quote->getTranslations('body')[0]['ge']}}
        @endif
    </a>
    <div class="flex">
        <a
            href="{{route('quote_edit', ['locale' => Config::get('app.locale'), 'quote' => $quote->id])}}"
            class="mr-4 text-blue-400 hover:text-blue-900"
            >{{ __("admin.edit") }}</a
        >
        <form
            action="{{route('delete_quote', ['locale' => Config::get('app.locale'), 'quote' => $quote->id])}}"
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
