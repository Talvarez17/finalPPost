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
}
