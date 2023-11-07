<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            "estatus" => 1,
            "mensaje" => "Registrado"
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where("email", "=", $request->email)->first();
        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "estatus" => 1,
                    "mensaje" => "Usuario Correcto",
                    "access_token" => $token
                ]);

            } else response()->json([
                "estatus" => 0,
                "mensaje" => "Usuario Incorrecto"
            ]);

        } else response()->json([
            "estatus" => 0,
            "mensaje" => "Usuario Inexistente"
        ], 404);
    }

    function userprofile(){

        return response()->json([
            "estatus" => 1,
            "mensaje" => "Perfil Usuario",
            "data" => auth()->user()
        ]);
    }

    function logout(){
        
        auth()->user()->tokens()->delete();
        return response()->json([
            "estatus" => 1,
            "mensaje" => "Cierre de Sesion"
        ]);
    }
}
