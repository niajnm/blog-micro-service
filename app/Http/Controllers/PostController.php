<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    // Add a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'token' =>  'required|string',
        ]);

        $response = Http::post('http://localhost:8000/api/validate', [
            'token' => $request->token
        ]);

        //dd("Abc");
        if ($response->failed()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user_id = $response->json()['user_id'];

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user_id, // Use the authenticated user ID
        ]);
       // dd("Abc");

        return response()->json(['post' => $post], 201);
    }

    // Get a list of all posts
    public function index()
    {
        $posts = Post::all();
        return response()->json(['posts' => $posts]);
    }
}
