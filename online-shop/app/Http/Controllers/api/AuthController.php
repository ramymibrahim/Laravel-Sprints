<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    //
    function login(Request $request)
    {
        if (Auth::attempt($request->post())) {
            $user = Auth::user();
            $user['api_token'] = Str::random(100);
            $user->save();
            return response()->json($user);
        }
        return response()->json('invalide credentials', 403);
    }

    function logout(){
        $user = Auth::user();
        $user['api_token'] = '';
        $user->save();
        return response()->json('Logged out successfully');
    }

    function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(100)
        ]);

        
        $user->save();
        return response()->json($user);
    }
}