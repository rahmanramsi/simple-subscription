<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// User routes
Route::post('/users', [UserController::class, 'store']);

// Website routes
Route::get('/websites', [WebsiteController::class, 'index']);
Route::post('/websites', [WebsiteController::class, 'store']);

// Subscription routes
Route::post('/subscribe', [SubscriptionController::class, 'store']);

// Post routes
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{websiteId}', [PostController::class, 'index']);
