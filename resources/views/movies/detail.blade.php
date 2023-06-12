@extends('layout.main')
@section('content')
    {{-- Movie detail overview trailer and other  --}}

    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto py-4 md:py-8 lg:py-12 items-center px-4 md:px-8 lg:px-12 flex flex-col md:flex-row">
            <img src={{ $movie['poster_path'] }} alt="detail img " class="w-64 lg:w-96" />
            <div class="md:ml-12 lg:ml-24 py-4 px-4">
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex items-center text-gray-500 text-sm ">
                    <span><svg class="w-4" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                            xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#"
                            xmlns:dc="http://purl.org/dc/elements/1.1/">
                            <g transform="translate(0 -1028.4)">
                                <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="#f39c12" />
                                <path
                                    d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                    fill="#f1c40f" />
                            </g>
                        </svg></span>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2"> {{ $movie['vote_count'] }} votes</span>
                    <span class="mx-2">|</span>
                    <span class="mx-2">{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span class="mx-2">
                        {{ $movie['genres'] }}
                    </span>
                </div>
                <p class="mt-8 text-gray-300">{{ $movie['overview'] }}</p>
                <div class="mt-12">
                    <h2 class="text-white font-semibold">Featured Crew </h2>
                    <div class="flex mt-4">
                        @foreach ($movie['crew'] as $crew)
                            <div class="mr-8">
                                <div>{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="{ isOpen: false }">
                    @if ($movie['videos']['results'] > 0)
                        <div class="mt-12">
                            <button @click="isOpen = true"
                                class="flex inline-flex items-center text-gray-900 bg-orange-500 transition ease-in-out duration-150 font-semibold rounded px-5 py-4 hover:bg-orange-600 ">
                                <svg fill="#000000" class="w-9" viewBox="0 0 24 24" id="play" data-name="Flat Line"
                                    xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                                    <path id="secondary" d="M12,3a9,9,0,1,0,9,9A9,9,0,0,0,12,3ZM10,16V8l6,4Z"
                                        style="fill: rgb(44, 169, 188); stroke-width: 2;"></path>
                                    <path id="primary" d="M16,12l-6,4V8ZM12,3a9,9,0,1,0,9,9A9,9,0,0,0,12,3Z"
                                        style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                    </path>
                                </svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                    @endif
                    <div style="background-color: rgba(0,0,0,.5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        x-show="isOpen">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex pr-4 pt-2 justify-end">
                                    <button @click="isOpen = false"
                                        class="text-3xl loading-none hover:text-gray-300">&times;</button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top:56.25%;">
                                        <iframe width="560" height="315"
                                            class="responsive-ifram absolute top-0 left-0 w-full h-full"
                                            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                            style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- image of caster and acors --}}

    <div class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="mt-3 text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['cast'] as $cast)
                    <div class="mt-8">
                        <a href={{ route('actors.show', $cast['id']) }}>
                            <img src={{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}
                                class="hover:opacity-75 transition ease-in-out duration-500" />
                        </a>

                        <a href={{ route('actors.show', $cast['id']) }} class="text-gray-500 mt-2">{{ $cast['name'] }}</a>
                        <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Image of movie --}}
    <div class="border-b border-gray-800" x-data="{ isOpen: false, image: ' ' }">
        <div class="container mx-auto px-4 py-16">
            <h2 class="mt-3 text-4xl font-semibold">Image</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-8">
                @foreach ($movie['images'] as $image)
                    <div class="mt-8">
                        <a href="#"
                            @click.prevent="isOpen=true
                                image='{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}'
                                ">
                            <img src={{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}
                                class="hover:opacity-75 transition ease-in-out duration-500" />
                        </a>


                    </div>
                @endforeach
            </div>
            <div style="background-color: rgba(0,0,0,.5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" x-show="isOpen">
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex pr-4 pt-2 justify-end">
                            <button @click="isOpen = false" @keydown.escape.window="isOpen = false"
                                class="text-3xl loading-none hover:text-gray-300">&times;</button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {{-- Image of movie --}}
@endsection
