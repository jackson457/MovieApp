<div class="relative" x-data="{ isOpen: true }" @click.away=" isOpen = false">
    <input wire:model.debounce.500ms="search" 
        type="text"
        class="rounded bg-gray-800 rounded-full w-64 px-3 pl-8 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Search (press '/' to focus)"
        x-ref="search"
        @keydown.escape.window="isOpen = false" 
        @keydown="isOpen = true"
        @focus= "isOpen = true"
        @keydown.shift.tab="isOpen = false"
        @keydown.window="
            if(event.keyCode === 191){
                $refs.search.focus();
            }
            "
        >
    <div class="absolute top-0 mt-2 ml-3 ">
        <svg class="w-4 text-gray-200  fill-current" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M10 4a6 6 0 1 0 0 12 6 6 0 0 0 0-12zm-8 6a8 8 0 1 1 14.32 4.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387A8 8 0 0 1 2 10z"
                fill="#0D0D0D" />
        </svg>
    </div>
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-4"></div>
    @if (strlen($search) > 0)
        <div class="absolute text-sm bg-gray-500 mt-4 w-64 rounded " 
            x-show="isOpen"
            
            >
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li class="z-50 border-b border-gray-700">
                            <a href={{ route('movies.show', $result['id']) }}
                                class="block px-2 py-3 hover:bg-gray-700 flex items-center"
                                @if ($loop->last) @keydown.tab="isOpen=false" @endif>
                                @if ($result['poster_path'])
                                    <span><img src={{ 'https://image.tmdb.org/t/p/w92/' . $result['poster_path'] }}
                                            class="w-8" alt="" /></span>
                                @else
                                    <span><img src="https://via.placeholder.com/50x75" class="w-8"
                                            alt="" /></span>
                                @endif

                                <span>{{ $result['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="py-2 px-3">No result for {{ $search }} </div>
            @endif
        </div>
    @endif
</div>
