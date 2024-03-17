<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {   
        try{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::where('email', '=', $request->email)->first();
            
            if (!$user) {
                return response()->json(['status' => 0, 'msg' => 'Credenciales incorrectas'], 401);
            }
        
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;

                 return response()->json([
                'status' => 1,
                'msg' => 'Inicio de sesión correctamente',
                'access_token' => $token,
                'user_id' => $user->id
                ], 200);

            }else{
                return response()->json(['status' => 0, 'msg' => 'Credenciales incorrectas'], 401);
            }
            
        }catch (\Exception $e) {
            return response()->json(['status' => 0, 'msg' => 'Error al iniciar sesión'], 500);
        }
    }
}
