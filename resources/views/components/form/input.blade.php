@props(['name', 'type' => 'text', 'value'=> ''])

<div class="mb-6">
    <label for="{{ $name }}" class="block text-gray-700 mb-3">
        {{ $slot }}
    </label>

    <div class="mt-1">
        <input
            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ $value }}"
        />
    </div>
            @error($name)
                @foreach($errors->get($name) as $error) @endforeach
                    <p class="text-red-500 text-sm mt-2">
                        @if(Config::get('app.locale') == 'ge')
                            {{$error['ge']}}
                            @else
                            {{$error['en']}}
                        @endif
                    </p>
            @enderror

</div>
