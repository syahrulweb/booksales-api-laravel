<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'name' => 'Fantasy',
                'description' => 'Genre yang berisi elemen magis dan dunia imajinatif.'
            ],
            [
                'name' => 'Science Fiction',
                'description' => 'Bercerita tentang teknologi masa depan, luar angkasa, atau sains fiksi.'
            ],
            [
                'name' => 'Mystery',
                'description' => 'Berfokus pada teka-teki dan penyelidikan kasus misterius.'
            ],
            [
                'name' => 'Romance',
                'description' => 'Menonjolkan kisah cinta dan hubungan emosional antar karakter.'
            ],
            [
                'name' => 'Horror',
                'description' => 'Bertujuan menimbulkan rasa takut, ngeri, atau ketegangan.'
            ],
        ]);
    }
}
