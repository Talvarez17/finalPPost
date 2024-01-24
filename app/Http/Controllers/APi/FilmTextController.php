<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilmText;
use Illuminate\Support\Facades\Hash;

class FilmTextController extends Controller
{
    public function index()
    {
        $FilmText = FilmCategory::All();
        return response()->json($FilmText);
    }

    public function index_id_film($film_id)
    {
        $FilmText = FilmText::find($film_id);
        return response()->json($FilmText);
    }

    public function create(Request $request)
    {
        $request->validate([
            'film_id' => 'required|unique:FilmText',
            'title' => 'required',
            'description' => 'required',
        ]);
        $FilmText = new FilmText();
        $FilmText -> film_id = $request->film_id;
        $FilmText -> title = $request->title;
        $FilmText -> description = $request->description;
        $FilmText -> save();
        return response()->json([
            "Model"=>$FilmText,
            "estatus" => 1,
            "mensaje" => "FilmText Creado"
        ]);
    }

    public function delete($film_id, $title, $description)
    {
        $FilmText = FilmText::find($film_id, $title, $description) -> delete();
        return response()->json([
            "Model"=>$FilmText,
            "estatus" => 1,
            "mensaje" => "FilmText Eliminado"
        ]);
    }
}
