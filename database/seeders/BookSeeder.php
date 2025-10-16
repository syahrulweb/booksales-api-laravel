<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => 'Harry Potter', 'author_id' => 1, 'genre' => 'Fantasy', 'year' => 1997],
            ['title' => 'Game of Thrones', 'author_id' => 2, 'genre' => 'Fantasy', 'year' => 1996],
            ['title' => 'Murder on the Orient Express', 'author_id' => 3, 'genre' => 'Mystery', 'year' => 1934],
            ['title' => 'The Shining', 'author_id' => 4, 'genre' => 'Horror', 'year' => 1977],
            ['title' => 'Foundation', 'author_id' => 5, 'genre' => 'Science Fiction', 'year' => 1951],
        ]);
    }
}

