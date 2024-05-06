<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use app\http\models\admin;

class AuthController extends Controller
{
    // Other methods

    public function login(Request $request)
    {
        $user = $request->only('email', 'password');

        if (Auth::attempt($user)) {
            if ($user = Auth::user()) {
                return response()->json([
                    'message' => 'Logged in as admin!'
                ]);
            } 
           
        else{
            return response()->json([
                'message' => 'Logged in successfully!'
            ]);
        }
    }
    }
}