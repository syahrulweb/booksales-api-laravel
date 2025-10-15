<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::allData();
        return view('author', compact('authors'));
    }
}
