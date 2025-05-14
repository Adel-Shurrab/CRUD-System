<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:70',
            'content' => 'required|string|max:',
        ]);
        

        
    }

    
}
