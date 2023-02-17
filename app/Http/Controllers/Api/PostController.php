<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'website_id' => 'required|exists:websites,id',
            'title' => 'required',
            'description' => 'required'
        ]);

        $website = Website::findOrFail($validatedData['website_id']);

        Post::create(
            [
                'website_id' => $website->id,
                'title' => $validatedData['title'],
                'description' => $validatedData['description']
            ]
        );

        return response()->json(['message' => 'Post created successfully.'], 201);
    }
}
