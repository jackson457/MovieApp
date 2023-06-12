@extends('layout.main')
@section('content')
    <div class="container mx-auto mt-16 px-4 flex-col md:flex-row">
        <div class="popular-movie">
                <h2 class="uppercase text-2xl tracking-wider text-orange-400 font-semibold ">Popular Movies</h2>
                <div class="grid grid-cols-1 mx-3 md:mx-0 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach ($popularMovies as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres" />
                    @endforeach
                </div>
        </div>
        <div class="popular-movie mt-16">
            <h2 class="uppercase text-2xl tracking-wider text-orange-400 font-semibold ">Now Playing Movies</h2>
            <div class="grid grid-cols-1 mx-3 md:mx-0 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie"/>
                @endforeach
            </div>
    </div>
    </div>
@endsection