<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;
class tvViewModel extends ViewModel
{
    public $popularTv;
    public $topRateTv;
    public $genres;
    public function __construct($popularTv,$topRated,$genres)
    {
        $this->popularTv=$popularTv;
         $this->topRateTv=$topRated;
         $this->genres=$genres;
    }
    public function popularTv(){
        return $this->formatTv($this->popularTv);
    
    }
    public function topRatedTv(){
        return $this->formatTv($this->topRateTv);
    }
    public function genres(){
        return collect($this->genres)->mapWithKeys( function($genre){
            return [$genre['id'] => $genre['name']];
        });
       
    }
    private function formatTv($tv){
        return collect($tv)->map(function($tv){
            $generatedGenres=collect($tv['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(',');
            return collect($tv)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500'.$tv['poster_path'],
                'vote_average' => $tv['vote_average'] * 10 ."%",
                'release_date' =>Carbon::parse($tv['first_air_date'])->format('M d,Y'),
                'genres' => $generatedGenres
            ]);
        });
    }
}
    