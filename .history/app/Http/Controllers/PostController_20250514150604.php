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

        $validatedData['title'] = strip_tags($validatedData['title']);
        // $validatedData['user_id'] = Auth::user()->id;
        $validatedData['user_id'] = $validatedData['user_id'] = Auth::id();
        Post::create($validatedData);
        return redirect()->route('home')->with('success', 'Post created successfully!');
    }
}
