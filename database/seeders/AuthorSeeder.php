<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'J.K. Rowling',
                'photo' => 'jk_rowling.jpg',
                'bio' => 'Penulis seri Harry Potter yang sangat populer di seluruh dunia.',
                'nationality' => 'United Kingdom',
            ],
            [
                'name' => 'George R.R. Martin',
                'photo' => 'george_rr_martin.jpg',
                'bio' => 'Penulis seri A Song of Ice and Fire, yang diadaptasi menjadi Game of Thrones.',
                'nationality' => 'United States',
            ],
            [
                'name' => 'Agatha Christie',
                'photo' => 'agatha_christie.jpg',
                'bio' => 'Penulis novel detektif legendaris dengan karakter Hercule Poirot dan Miss Marple.',
                'nationality' => 'United Kingdom',
            ],
            [
                'name' => 'Stephen King',
                'photo' => 'stephen_king.jpg',
                'bio' => 'Penulis terkenal dalam genre horor dan thriller seperti IT, The Shining, dan Carrie.',
                'nationality' => 'United States',
            ],
            [
                'name' => 'Isaac Asimov',
                'photo' => 'isaac_asimov.jpg',
                'bio' => 'Penulis dan profesor sains yang terkenal dengan karya fiksi ilmiah seperti Foundation dan I, Robot.',
                'nationality' => 'Russia',
            ],
        ]);
    }
}
