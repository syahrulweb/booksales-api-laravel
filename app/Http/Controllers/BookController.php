<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    // GET: ambil semua data buku
    public function index()
    {
        $books = Book::with(['genre', 'author'])->get();

        if ($books->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $books
        ], 200);
    }

    // POST: tambah data buku baru
    public function store(Request $request)
    {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'cover_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'genre_id' => 'required|integer|exists:genres,id',
            'author_id' => 'required|integer|exists:authors,id',
        ]);

        // 2. Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // 3. Upload Image
        $file = $request->file('cover_photo');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/books'), $fileName);

        // 4. Insert data
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => 'uploads/books/' . $fileName,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ]);

        // 5. Response
        return response()->json([
            'success' => true,
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }
}
