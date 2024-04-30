<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function getTareas()
    {
        $Tarea = Tarea::All();
        return response()->json($Tarea);
    }

    public function getTareaById($id)
    {
        $Tarea = Tarea::find($id);
        return response()->json($Tarea);
    }

    public function insertTarea(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fechacreacion' => 'required',
        ]);
    
        $Tarea = new Tarea();
        $Tarea->titulo = $request->titulo;
        $Tarea->descripcion = $request->descripcion; 
        $Tarea->fechacreacion = $request->fechacreacion;
        $Tarea->save();
    
        return response()->json([
            "Model" => $Tarea,
            "estatus" => 1,
            "mensaje" => "Tarea registrada"
        ]);
    }
    public function updateTarea(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fechacreacion' => 'required',
        ]);
    
        $Tarea = Tarea::find($request->id);
        $Tarea->titulo = $request->titulo;
        $Tarea->descripcion = $request->descripcion; 
        $Tarea->fechacreacion = $request->fechacreacion;
        $Tarea->update();

        return response()->json([
            "Model" => $Tarea,
            "estatus" => 1,
            "mensaje" => "Tarea actualizada"
        ]);
    }
    public function deleteTarea($id)
    {
        $Tarea = Tarea::find($id)->delete();
        return response()->json([
            "estatus" => 1,
            "mensaje" => "Tarea eliminada"
        ]);
    }
}
