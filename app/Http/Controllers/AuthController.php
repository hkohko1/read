<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function AuthorRegister(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:authors",
            "password" => "required|confirmed",
        ]);
        $user = author::create([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => Hash::make($request->input('password')),
        ]);
        $token = $user->createToken('auth_t');
        return response()->json(["message" => $user, 'token' => $token->plainTextToken, "role" => "author"], 201);
    }
    public function ReaderRegister(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:readers",
            "password" => "required|confirmed",
        ]);
        $user = reader::create([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => Hash::make($request->input('password')),
        ]);

        $token = $user->createToken('auth_t');
        return response()->json(["message" => $user, 'token' => $token->plainTextToken, "role" => "reader"], 201);
    }

    public function AuthorLogin(Request $request)
    {
        $request->validate([
            "email" => "email|required",
            "password" => "required"
        ]);

        $user = author::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['message' => 'User Not Found'], 401);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Wrong password'], 401);
        }
        $token = $user->createToken('auth_t');
        return response()->json([
            'token' => $token->plainTextToken,
            'role' => "author"
        ]);
    }
    public function ReaderLogin(Request $request)
    {
        $request->validate([
            "email" => "email|required",
            "password" => "required"
        ]);

        $user = reader::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['message' => 'User Not Found'], 401);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Wrong password'], 401);
        }
        $token = $user->createToken('auth_t');
        return response()->json([
            'token' => $token->plainTextToken,
            'role' => "reader"
        ]);
    }
}
