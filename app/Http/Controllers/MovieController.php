<?php

namespace App\Http\Controllers;

use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use App\ViewModels\MoviesViewModels;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Popular Movies
        $popularMovies=Http::withOptions(['verify'=>false])->get('https://api.themoviedb.org/3/movie/popular?api_key='.env('TMDB_API_TOKEN'))
        ->json()['results'];
        
        //Now playing Movie
        $nowPlayingMovies=Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key='.env('TMDB_API_TOKEN'))
        ->json()['results'];
        $genres=Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key='.env('TMDB_API_TOKEN'))
        ->json()['genres'];
        
      $viewModel=new MoviesViewModels(
        $nowPlayingMovies,
        $popularMovies,
        $genres
      );

        return view('movies.index',$viewModel);
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
    public function show($id)
    {
        $Movie=Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key='.env('TMDB_API_TOKEN').'&append_to_response=credits,videos,images')
        ->json();
        $movie=new MovieViewModel(
            $Movie
        );
        return view('movies.detail',
            $movie
        );
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
