@extends('layout.main')
@section('content')
    <div class="container mx-auto mt-16 px-4 flex-col md:flex-row">
        <div class="popular-tv">
            <h2 class="uppercase text-2xl tracking-wider text-orange-400 font-semibold ">Popular TvShow</h2>
            <div class="grid grid-cols-1 mx-3 md:mx-0 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularTv as $tv)
                    <x-tv-card :tvShow="$tv" :genres="$genres" />
                @endforeach
            </div>
        </div>
        <div class="popular-tv mt-16">
            <h2 class="uppercase text-2xl tracking-wider text-orange-400 font-semibold ">Top Rated TvShows</h2>
            <div class="grid grid-cols-1 mx-3 md:mx-0 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($topRatedTv as $tv)
                    <x-tv-card :tvShow="$tv" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
