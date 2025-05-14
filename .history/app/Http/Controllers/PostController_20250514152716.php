<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:70',
            'body' => 'required|string|max:300',
        ]);

        $validatedData['title'] = e(strip_tags($validatedData['title']));
        $validatedData['body'] = e(strip_tags($validatedData['body']));
        $validatedData['user_id'] = Auth::id(); // Add the authenticated user's ID

        Post::create($validatedData);

        return redirect()->route('home')->with('success', 'Post created successfully!');
    }
}
