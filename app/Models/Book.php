<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'cover_photo',
        'genre_id',
        'author_id',
    ];

    // relasi ke genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // relasi ke author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
