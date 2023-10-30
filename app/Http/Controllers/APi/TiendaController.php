<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tienda;

class TiendaController extends Controller
{
    public function index()
    {
        $Tienda = Tienda::All();
        return response()->json($Tienda);
    }

    public function index_id($id)
    {
        $Tienda = Tienda::find($id);
        return response()->json($Tienda);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:tienda',
            'edad' => 'required',
        ]);
        $Tienda = new Tienda();
        $Tienda->nombre = $request->nombre;
        $Tienda->edad = $request->edad;
        $Tienda->save();
        return response()->json([
            "estatus" => 1,
            "mensaje" => "registrado"
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required',
        ]);
        $Tienda = Tienda::find($id);
        $Tienda->nombre = $request->nombre;
        $Tienda->edad = $request->edad;
        $Tienda->update();
        return response()->json([
            "Model"=>$Tienda,
            "estatus" => 1,
            "mensaje" => "registrado"
        ]);
    }
    public function delete($id)
    {
        $Tienda = Tienda::find($id)->delete();
        return response()->json([
            
            "estatus" => 1,
            "mensaje" => "Eliminado"
        ]);
    }
}
