<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            ['name' => 'J.K. Rowling', 'nationality' => 'United Kingdom'],
            ['name' => 'George R.R. Martin', 'nationality' => 'United States'],
            ['name' => 'Agatha Christie', 'nationality' => 'United Kingdom'],
            ['name' => 'Stephen King', 'nationality' => 'United States'],
            ['name' => 'Isaac Asimov', 'nationality' => 'Russia'],
        ]);
    }
}
