<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                return response()->json([
                    'user' => $user,
                    'token'=> $user->createToken('token')->plainTextToken
                ]);
            }
            else{
                return response()->json([
                    'user' => null,
                    'token'=> null
                ]);
            }
        }
    }
}
