<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Models\ApiUserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Login $request)
    {
        $requestData = $request->validated();

        if (Auth::attempt($requestData)) {
            return redirect('/applicationData');
        }

        return back()->withErrors(['password' => 'Invalid User Name Or Password']);
    }

    public function storeApiLogin(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|string|',
            ]);
            $requestData = $request->all();

            $data = [
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'password' => Hash::make($requestData['password']),
            ];
            $user = ApiUserDetails::create($data);
            return response()->json([
                'status' => 'success',
                'message' => 'User Stored successful',
            ]);
            
        } catch (\Throwable $th) {
            Log::error('Error storing user details: ' . $th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to store user details',
                'error' => $th->getMessage(),
                'data' => $request->all(),
            ], 200);
        }
    }

    public function userDetails()
    {
        try {

            $userData = ApiUserDetails::all();
            if ($userData->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No user details found',
                ], 404);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'User details fetched successfully',
                'data' => $userData->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            Log::error('Error fetching user details: ' . $th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch user details',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function deleteUser($userId)
    {
        try {
            $user = ApiUserDetails::find($userId);
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not found',
                ], 404);
            }
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted successfully',
            ], 200);
        } catch (\Throwable $th) {
            Log::error('Error deleting user: ' . $th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete user',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function editUser($userId)
    {
        try {
            $user = ApiUserDetails::where('user_id', $userId)->select('password', 'name', 'email')->first();
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not found',
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'User found',
                'data' => $user->toArray(),
            ], 200);

        } catch (\Throwable $th) {
            Log::error('Error updating user: ' . $th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update user',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
