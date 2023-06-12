<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\tvController;
use Illuminate\Support\Facades\Route;

//Movies routes
Route::get('/',[MovieController::class,'index'])->name('movies.index');
Route::get('/movie/{id}',[MovieController::class,'show'])->name('movies.show');

//Actors route
Route::get('/actors',[ActorsController::class,'index'])->name('actors.index');
Route::get('/actorsinfo/{actor}',[ActorsController::class,'show'])->name('actors.show');
Route::get('/actors/page/{page}',[ActorsController::class,'index']);

//Tvshow routes
Route::get('/tvShow',[tvController::class,'index'])->name('tv.index');
Route::get('/tvShow/{id}',[tvController::class,'show'])->name('tv.show');
