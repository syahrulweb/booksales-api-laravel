<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    // GET all
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

    // GET by ID
    public function show($id)
    {
        $author = Author::with('books')->find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author not found!"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get author detail",
            "data" => $author
        ], 200);
    }

    // POST
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $author = Author::create($request->only(['name', 'photo', 'bio', 'nationality']));

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'data' => $author
        ], 201);
    }

    // PUT / PATCH
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author not found!"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'nationality' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $author->update($request->only(['name', 'photo', 'bio', 'nationality']));

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully',
            'data' => $author
        ], 200);
    }

    // DELETE
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author not found!"
            ], 404);
        }

        $author->delete();

        return response()->json([
            "success" => true,
            "message" => "Author deleted successfully"
        ], 200);
    }
}
