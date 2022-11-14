<x-dashboard>
    <section>
        <h2 class="uppercase font-semibold mb-5 text-xl">{{__('admin.movies')}}</h2>
           @if($movies->count())
            <x-show-movie :movies=$movies/>
             {{$movies->links('pagination::tailwind')}}

            @else
            <p class="text-center">{{__('admin.noMovies')}} </p>
            @endif
    </section>
</x-dashboard>
