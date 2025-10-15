<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::allData();
        return view('genre', compact('genres'));
    }
}
