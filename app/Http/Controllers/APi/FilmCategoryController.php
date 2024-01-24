<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilmCategory;
use Illuminate\Support\Facades\Hash;

class FilmCategoryController extends Controller
{
    public function index()
    {
        $FilmCategory = FilmCategory::All();
        return response()->json($FilmCategory);
    }

    public function index_id_film($film_id)
    {
        $FilmCategory = FilmCategory::find($film_id);
        return response()->json($FilmCategory);
    }

    public function index_id_category($category_id)
    {
        $FilmCategory = FilmCategory::find($category_id);
        return response()->json($FilmCategory);
    }

    public function create(Request $request)
    {
        $request->validate([
            'film_id' => 'required|unique:FilmCategory',
            'category_id' => 'required',
        ]);
        $FilmCategory = new FilmCategory();
        $FilmCategory -> film_id = $request->film_id;
        $FilmCategory -> category_id = $request->category_id;
        $FilmCategory -> save();
        return response()->json([
            "Model"=>$FilmCategory,
            "estatus" => 1,
            "mensaje" => "FilmCategory Creado"
        ]);
    }

    public function delete($film_id, $category_id)
    {
        $FilmCategory = FilmCategory::find($film_id, $category_id) -> delete();
        return response()->json([
            "Model"=>$FilmCategory,
            "estatus" => 1,
            "mensaje" => "FilmCategory Eliminado"
        ]);
    }
}
