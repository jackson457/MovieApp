@extends('layout.main')
@section('content')
    <div class="container mx-auto py-4 py-16">
        <div class="popular-actors">
            <h2 class="uppercase text-lg font-semibold text-orange-500 tracking-wider">
                Popular Actors
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularActors as $actors)
                <div class="actors mt-8">
                    <a href={{route("actors.show",$actors['id'])}}>
                        <img src={{$actors['profile_path']}} class="hover:opacity-75 transition ease-in-out duration-500"/>
                    </a>
               
                <div>
                    <a href={{route("actors.show",$actors['id'])}} class="hover:text-gray-300 text-lg">{{$actors['name']}} </a>
                    <div class="text-sm truncate text-gray-400">{{$actors['known_for']}}</div>
                </div>
            </div>
                @endforeach
               
            </div>
        </div>  
        <div class="page-load-status my-8">
            <div class="flex justify-center">
                <p class="infinite-scroll-request spinner my-8 text-4xl ">&nbsp;</p>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error </p>
          </div>
    </div>
@endsection

@section('script')
<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js">
</script>
<script>
     let elem = document.querySelector('.grid');
let infScroll = new InfiniteScroll( elem, {
  path: '/actors/page/@{{#}}',
  append: '.actors',
  status: '.page-load-status'
});
</script>
@endsection