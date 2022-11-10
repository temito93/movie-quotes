@props(['name', 'type' => 'text'])

<div class="mb-6">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
        {{ ucwords($name) }}
    </label>

    <div class="mt-1">
        <input class="block w-full appearance-none rounded-md border
        border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm
        focus:border-indigo-500 focus:outline-none focus:ring-indigo-500
        sm:text-sm" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        {{$attributes(['value' => old($name)])}}
        />
    </div>
    @error($name)
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
