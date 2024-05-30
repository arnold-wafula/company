<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return response()->json($posts, Response::HTTP_OK);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $post = new Post([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        $post->save();

        return response()->json(['message' => $post], Response::HTTP_CREATED);
    }

    public function destroy($id) {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], Response::HTTP_NOT_FOUND);
        }

        $post->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}