<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserAuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        try {
            // Validate input data, including password confirmation
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    
            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation errors',
                    'errors' => $validator->errors()
                ], 422); // Unprocessable entity
            }
    
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            // Ensure user creation was successful
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User registration failed',
                ], 500); // Internal server error
            }
    
            // Create token for the new user
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'success' => true,
                'access_token' => $token,
                'user' => $user,
            ], 201); // Created successfully
    
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage(),
            ], 500); // Internal server error
        }
    }
    

    // Login
    public function login(Request $request)
    {
        try {
            // Validate input data
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation errors',
                    'errors' => $validator->errors()
                ], 422); // Unprocessable entity
            }

            // Attempt to login
            if (!Auth::attempt($validator->validated())) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid login details',
                ], 401); // Unauthorized
            }

            // Retrieve user and create token
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found',
                ], 404); // Not Found
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'access_token' => $token,
                'user' => $user,
                'token_type' => 'Bearer',
            ], 200); // Success

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed',
                'error' => $e->getMessage(),
            ], 500); // Internal server error
        }
    }

    // Logout
    public function logout(Request $request)
    {
        try {
            // Ensure the user is authenticated
            if (!$request->user()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not authenticated',
                ], 401); // Unauthorized
            }

            // Check if the user has any active tokens
            if ($request->user()->currentAccessToken()) {
                // Revoke the current token
                $request->user()->currentAccessToken()->delete();
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No active token found',
                ], 404); // Not Found
            }

            return response()->json([
                'success' => true,
                'message' => 'Logged out successfully',
            ], 200); // Success

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed',
                'error' => $e->getMessage(),
            ], 500); // Internal server error
        }
    }
}
