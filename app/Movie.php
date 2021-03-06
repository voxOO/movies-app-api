<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable= [
        'title ', 'director' , 'duration' , 'releaseDate' , 'genre'
    ];

    protected $hidden= [
        'id'
    ];

    const STORE_RULES = [
        'title' => 'required',
        'director' => 'required',
        'duration' => 'required|min:1|max:500',
        'releaseDate' => 'required',
        'imageUrl' => 'url'
    ];

    public static function search ($searchTerm,$take,$skip) {
        
       return self::where('title', 'like', "%{$searchTerm}%")->get();
    }
}
