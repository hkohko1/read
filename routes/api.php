<?php

use App\Http\Controllers\AuthController;
use App\Models\author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//authentification
Route::controller(AuthController::class)->group(function () {
    Route::post('/author/register', 'AuthorRegister');
    Route::post('/reader/register', 'ReaderRegister');
    Route::post('/author/login', 'AuthorLogin');
    Route::post('/reader/login', 'ReaderLogin');
});

Route::get('/book', function (Request $request) {
    $users = author::all();
    return response()->json([$users]);
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
