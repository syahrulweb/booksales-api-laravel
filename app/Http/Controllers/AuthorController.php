<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    // READ ALL DATA
    public function index()
    {
        $authors = Author::with('books')->get();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all authors',
            'data' => $authors
        ], 200);
    }

    // CREATE DATA
    public function store(Request $request)
    {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255'
        ]);

        // 2. Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // 3. Insert data
        $author = Author::create([
            'name' => $request->name,
            'nationality' => $request->nationality
        ]);

        // 4. Response
        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'data' => $author
        ], 201);
    }
}
