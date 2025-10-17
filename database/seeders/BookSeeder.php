<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Harry Potter',
                'description' => 'Kisah penyihir muda bernama Harry Potter dalam dunia sihir Hogwarts.',
                'price' => 120000,
                'stock' => 10,
                'cover_photo' => 'harry_potter.jpg',
                'genre_id' => 1,
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Game of Thrones',
                'description' => 'Pertarungan kekuasaan antar keluarga bangsawan di Westeros.',
                'price' => 150000,
                'stock' => 8,
                'cover_photo' => 'game_of_thrones.jpg',
                'genre_id' => 1,
                'author_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Murder on the Orient Express',
                'description' => 'Detektif Hercule Poirot menyelidiki pembunuhan di kereta Orient Express.',
                'price' => 100000,
                'stock' => 12,
                'cover_photo' => 'orient_express.jpg',
                'genre_id' => 3,
                'author_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Shining',
                'description' => 'Cerita horor tentang keluarga yang tinggal di hotel terpencil selama musim dingin.',
                'price' => 130000,
                'stock' => 6,
                'cover_photo' => 'the_shining.jpg',
                'genre_id' => 5,
                'author_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Foundation',
                'description' => 'Sebuah karya fiksi ilmiah tentang kejatuhan dan kebangkitan kekaisaran galaksi.',
                'price' => 110000,
                'stock' => 9,
                'cover_photo' => 'foundation.jpg',
                'genre_id' => 2,
                'author_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
