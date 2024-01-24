<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Hash;

class FilmController extends Controller
{
    public function index()
    {
        $Film = Film::All();
        return response()->json($Film);
    }

    public function index_id($film_id)
    {
        $Film = Film::find($film_id);
        return response()->json($Film);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:Film',
            'description' => 'required',
            'release_year' => 'required',
            'language_id' => 'required',
            'original_language_id' => 'required',
            'rental_duration' => 'required',
            'rental_rate' => 'required',
            'length' => 'required',
            'replacement_cost' => 'required',
            'rating' => 'required',
            'special_features' => 'required'
        ]);
        $Film = new Film();
        $Film -> title = $request->title;
        $Film -> description = $request->description;
        $Film -> release_year = $request->release_year;
        $Film -> language_id = $request->language_id;
        $Film -> original_language_id = $request->original_language_id;
        $Film -> rental_duration = $request->rental_duration;
        $Film -> rental_rate = $request->rental_rate;
        $Film -> length = $request->length;
        $Film -> replacement_cost = $request->replacement_cost;
        $Film -> rating = $request->rating;
        $Film -> special_features = $request->special_features;
        $Film -> save();
        return response()->json([
            "Model"=>$Film,
            "estatus" => 1,
            "mensaje" => "Film Registrado"
        ]);
    }

    public function update(Request $request, $film_id)
    {
        $request->validate([
            'title' => 'required|unique:Film',
            'description' => 'required',
            'release_year' => 'required',
            'language_id' => 'required',
            'original_language_id' => 'required',
            'rental_duration' => 'required',
            'rental_rate' => 'required',
            'length' => 'required',
            'replacement_cost' => 'required',
            'rating' => 'required',
            'special_features' => 'required'
        ]);
        $Film = Film::find($film_id);
        $Film -> title = $request->title;
        $Film -> description = $request->description;
        $Film -> release_year = $request->release_year;
        $Film -> language_id = $request->language_id;
        $Film -> original_language_id = $request->original_language_id;
        $Film -> rental_duration = $request->rental_duration;
        $Film -> rental_rate = $request->rental_rate;
        $Film -> length = $request->length;
        $Film -> replacement_cost = $request->replacement_cost;
        $Film -> rating = $request->rating;
        $Film -> special_features = $request->special_features;
        $Film -> update();
        return response()->json([
            "Model"=>$Film,
            "estatus" => 1,
            "mensaje" => "Actualizado"
        ]);
    }

    public function delete($film_id)
    {
        $Film = Film::find($film_id) -> delete();
        return response()->json([
            "Model"=>$Film,
            "estatus" => 1,
            "mensaje" => "Eliminado"
        ]);
    }
}
