<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Requests\MoviesAddingRules;

class MoviesController extends Controller
{
    public function index(Request $request) {
       
        // if ($searchTitle = $request->input('title')) {
        // return Movie::where('title',$searchTitle)->get();
        // } else {
        // return Movie::all();
        // }
        if ($searchTitle = $request->input('title')) {
       
            $searchParam = $request->input('title');
            return Movie::search();
            

        } else {
           return Movie::all();
        }
    }

    public function show($id) {
        return Movie::find($id);
    }

    public function store(MoviesAddingRules $request) {

        \Log::info('DDDD');
        //$this->validate($request, Movie::STORE_RULES);
        \Log::info('SSS');


        $movie = new Movie();

        $movie->title = $request->input('title');
        $movie->director = $request->input('director');
        $movie->imageUrl = $request->input('imageURL');
        $movie->duration = $request->input('duration');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->genre = $request->input('genre');

        $movie->save();

        return $movie;
    }

    public function update(Request $request, $id) {

        $movie = Movie::find($id);
        
        $movie->title = $request->input('title');
        $movie->director = $request->input('director');
        $movie->imageUrl = $request->input('imageURL');
        $movie->duration = $request->input('duration');
        $movie->releaseDate = $request->input('releaseDate');
        $movie->genre = $request->input('genre');

        $movie->save();

        return $movie;
    }

    public function destroy($id) {

        $movie = Movie::find($id);
        $movie->delete();
        return "Brisanje filma je izvrsno uspesno";
    }


}
