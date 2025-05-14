<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Get all posts with user relationship
        $all_posts = Post::with('user')->latest()->get();

        // Get only the current user's posts
        $user_posts = Post::where('user_id', Auth::id())->latest()->get();

        return view('home', compact('all_posts', 'user_posts'));
    }

    public function createPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:70',
            'body' => 'required|string|max:300',
        ]);

        $validatedData['title'] = e(strip_tags($validatedData['title']));
        $validatedData['body'] = e(strip_tags($validatedData['body']));
        $validatedData['user_id'] = Auth::id();

        Post::create($validatedData);

        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // Check if the user is authorized to edit this post
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to edit this post.');
        }

        return view('edit-post', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Check if the user is authorized to update this post
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to edit this post.');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:70',
            'body' => 'required|string|max:300',
        ]);

        $validatedData['title'] = e(strip_tags($validatedData['title']));
        $validatedData['body'] = e(strip_tags($validatedData['body']));

        $post->update($validatedData);

        return redirect()->route('home')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Check if the user is authorized to delete this post
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete this post.');
        }

        $post->delete();

        return redirect()->route('home')->with('success', 'Post deleted successfully!');
    }
}
