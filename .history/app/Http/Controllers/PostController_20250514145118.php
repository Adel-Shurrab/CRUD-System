<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Logic to fetch and display posts
        return view('posts.index');
    
}
