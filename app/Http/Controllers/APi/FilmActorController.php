<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilmActor;
use Illuminate\Support\Facades\Hash;

class FilmActorController extends Controller
{
    public function index()
    {
        $FilmActor = FilmActor::All();
        return response()->json($FilmActor);
    }

    // Obtener por Actor
    public function actor_id($actor_id)
    {
        $FilmActor = FilmActor::find($actor_id);
        return response()->json($FilmActor);
    }

    // Obtener por Film
    public function film_id($film_id)
    {
        $FilmActor = FilmActor::find($film_id);
        return response()->json($FilmActor);
    }

    public function create(Request $request)
    {
        $request->validate([
            'actor_id' => 'required|unique:FilmActor',
            'film_id' => 'required',
        ]);
        $FilmActor = new FilmActor();
        $FilmActor -> actor_id = $request->actor_id;
        $FilmActor -> film_id = $request->film_id;
        $FilmActor -> save();
        return response()->json([
            "Model"=>$FilmActor,
            "estatus" => 1,
            "mensaje" => "FilmActor Registrado"
        ]);
    }

    public function delete($actor_id, $film_id)
    {
        $FilmActor = FilmActor::find($actor_id, $film_id) -> delete();
        return response()->json([
            "Model"=>$FilmActor,
            "estatus" => 1,
            "mensaje" => "Eliminado"
        ]);
    }
}
