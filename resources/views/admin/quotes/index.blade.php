<x-dashboard>
    <section>
        <h2 class="uppercase font-semibold mb-5 text-xl">{{__('admin.quotes')}}</h2>
           @if($quotes->count())
            <x-show-quote :quotes=$quotes/>
             {{$quotes->links('pagination::tailwind')}}

            @else
            <p class="text-center">{{__('admin.noQuotes')}}</p>
            @endif
    </section>
</x-dashboard>
