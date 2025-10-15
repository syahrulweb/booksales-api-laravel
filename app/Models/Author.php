<?php

namespace App\Models;

class Author
{
    public static function allData()
    {
        return [
            ['id' => 1, 'name' => 'J.K. Rowling'],
            ['id' => 2, 'name' => 'George R.R. Martin'],
            ['id' => 3, 'name' => 'Agatha Christie'],
            ['id' => 4, 'name' => 'Stephen King'],
            ['id' => 5, 'name' => 'Isaac Asimov'],
        ];
    }
}
