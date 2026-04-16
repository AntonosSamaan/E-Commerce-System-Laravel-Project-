<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // --- Register Function ---
    public function register(Request $request)
    {
        // Validate inputs
        $errors = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($errors->fails()) {
            return response()->json([
                'error' => $errors->errors()
            ], 422);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Generate access token
        $access_token = Str::random(64);
        $user->update(['access_token' => $access_token]);

        return response()->json([
            'msg' => 'Account registered successfully',
            'access_token' => $access_token
        ], 200);
    }

    // --- Login Function ---
    public function login(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($errors->fails()) {
            return response()->json([
                'error' => $errors->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'msg' => 'Email not found'
            ], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'msg' => 'Password is incorrect'
            ], 401);
        }

        // Generate new access token
        $access_token = Str::random(64);
        $user->update(['access_token' => $access_token]);

        return response()->json([
            'msg' => 'Logged in successfully',
            'access_token' => $access_token
        ], 200);
    }

    // --- Logout Function ---
    public function logout(Request $request)
    {
        $access_token = $request->header('access_token');

        if (!$access_token) {
            return response()->json([
                'msg' => 'Access token required'
            ], 400);
        }

        $user = User::where('access_token', $access_token)->first();

        if (!$user) {
            return response()->json([
                'msg' => 'Access token not valid'
            ], 401);
        }

        // Remove token
        $user->update(['access_token' => null]);

        return response()->json([
            'msg' => 'User logged out successfully'
        ], 200);
    }

    // --- Get Current User ---
    public function me(Request $request)
    {
        $access_token = $request->header('access_token');

        if (!$access_token) {
            return response()->json(['msg' => 'Access token required'], 400);
        }

        $user = User::where('access_token', $access_token)->first();

        if (!$user) {
            return response()->json(['msg' => 'Access token not valid'], 401);
        }

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]
        ], 200);
    }
}