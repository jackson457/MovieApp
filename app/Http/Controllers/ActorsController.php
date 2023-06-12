<?php

namespace App\Http\Controllers;

use App\ViewModels\ActorsViewModels;
use App\ViewModels\ActorViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    /**src={{$
     * Display a listing of the resource.
     */
    public function index($page = 1)
    {
        abort_if($page > 500, 204);
        $popularActors=Http::get('https://api.themoviedb.org/3/person/popular?page='.$page.'&api_key='.env('TMDB_API_TOKEN'))
        ->json(['results']);
        $actors=new ActorsViewModels($popularActors,$page);
        return view('actors.index',$actors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $actor=Http::get('https://api.themoviedb.org/3/person/'.$id.'?api_key='.env('TMDB_API_TOKEN'))
        ->json();
        $social=Http::get('https://api.themoviedb.org/3/person/'.$id.'/external_ids?api_key='.env('TMDB_API_TOKEN'))
        ->json();
        $credits=Http::get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits?api_key='.env('TMDB_API_TOKEN'))
        ->json();
        $actors=new ActorViewModel(
            $actor,
            $social,
            $credits
        );
        return view("actors.show",$actors);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
