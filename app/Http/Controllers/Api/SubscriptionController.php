<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
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
            'email' => 'required|email',
            'website_id' => 'required|integer'
        ]);

        $user = User::firstOrCreate(['email' => $validatedData['email']]);

        $website = Website::findOrFail($validatedData['website_id']);

        $user->websites()->attach($website->id);

        return response()->json(['message' => 'Subscription created successfully.'], 201);
    }
}
