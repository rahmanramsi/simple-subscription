<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $websites = Website::all();
        return response()->json($websites);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'url' => ['required', 'url', 'unique:websites,url']
        ]);

        Website::create($validated);

        return response()
            ->json([
                'message' => 'Website created successfully.',
            ], 201);
    }
}
