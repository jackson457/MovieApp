<?php

namespace App\Http\Controllers;

use App\ViewModels\tvDetailModel;
use App\ViewModels\tvViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class tvController extends Controller
{
    /**
     * Display a listing of the resource.
 */
    public function index(){
    // {
         $popularTv=Http::get('https://api.themoviedb.org/3/tv/popular?api_key='.env('TMDB_API_TOKEN'))
         ->json()['results'];
          $topRatedTv=Http::get('https://api.themoviedb.org/3/tv/top_rated?api_key='.env('TMDB_API_TOKEN'))
         ->json()['results'];
         $genres=Http::get('https://api.themoviedb.org/3/genre/tv/list?api_key='.env('TMDB_API_TOKEN'))
         ->json()['genres'];
        $tvShowsModel=new tvViewModel($popularTv,$topRatedTv,$genres);
       
        return view("tvShow.index",$tvShowsModel);
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
        $tvShow=Http::get('https://api.themoviedb.org/3/tv/'.$id.'?api_key='.env('TMDB_API_TOKEN').'&append_to_response=credits,videos,images')
        ->json();
        $tv=new tvDetailModel($tvShow);
        return view("tvShow.show",$tv);
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
