<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
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

    public function encriptar(Request $request){
   
        $user= new User();
        $user->password = Hash::make($request->password);

        return response()->json([
            "pass" => $user->password
        ]);
    } 

    public function getRegistros()
    {
        $User = User::All();
        return response()->json($User);
    }

    public function getUserById($id)
    {
        $User = User::find($id);
        return response()->json($User);
    }
    
    public function updateUser(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();

        return response()->json([
            "estatus" => 1,
            "mensaje" => "User actualizada"
        ]);
    }
    public function deleteUser($id)
    {
        $User = User::find($id)->delete();
        return response()->json([
            "estatus" => 1,
            "mensaje" => "User eliminada"
        ]);
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);


    $user = User::where('email', $request->email)->first();

    if (!$user || $request->password !== $user->password) {
        return response()->json([
            "estatus" => 0,
            "mensaje" => "Credenciales incorrectas"
        ], 401);
    }

    return response()->json([
        "estatus" => 1,
        "mensaje" => "Inicio de sesión exitoso"
    ]);
}
}
