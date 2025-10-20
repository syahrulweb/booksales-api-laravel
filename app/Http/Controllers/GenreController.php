<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    // GET all
    public function index()
    {
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all genres',
            'data' => $genres
        ], 200);
    }

    // GET by ID
    public function show($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Genre not found!"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get genre detail",
            "data" => $genre
        ], 200);
    }

    // POST
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $genre = Genre::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Genre created successfully',
            'data' => $genre
        ], 201);
    }

    // PUT / PATCH
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Genre not found!"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $genre->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Genre updated successfully',
            'data' => $genre
        ], 200);
    }

    // DELETE
    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Genre not found!"
            ], 404);
        }

        $genre->delete();

        return response()->json([
            "success" => true,
            "message" => "Genre deleted successfully"
        ], 200);
    }
}
