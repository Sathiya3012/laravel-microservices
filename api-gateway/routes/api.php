<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

$postProjectUrl = env('POST_PROJECT_URL');

Route::middleware('auth')->group(function () use ($postProjectUrl) {
    Route::get('posts', function () use ($postProjectUrl) {
        $response = Http::get("$postProjectUrl/posts");
        return $response->json();
    });

    Route::get('posts/{id}', function ($id) use ($postProjectUrl) {
        $response = Http::get("$postProjectUrl/posts/{$id}");
        return $response->json();
    });

    Route::post('posts', function (Illuminate\Http\Request $request) use ($postProjectUrl) {
        $response = Http::post("$postProjectUrl/posts", $request->all());
        return $response->json();
    });

    Route::put('posts/{id}', function ($id, Illuminate\Http\Request $request) use ($postProjectUrl) {
        $response = Http::put("$postProjectUrl/posts/{$id}", $request->all());
        return $response->json();
    });

    Route::delete('posts/{id}', function ($id) use ($postProjectUrl) {
        $response = Http::delete("$postProjectUrl/posts/{$id}");
        return $response->json();
    });
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});


