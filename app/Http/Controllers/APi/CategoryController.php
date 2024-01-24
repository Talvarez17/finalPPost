<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
public function indexCategory()
{
    $Category = Category::All();
    return response()->json($Category);
}

public function index_idCategory($id)
{
    $Category = Category::find($id);
    return response()->json($Category);
}

public function createCategory(Request $request)
{
    $request->validate([
        'name' => 'required',
    ]);

    $Category = new Category();
    $Category->name = $request->name;
    $Category->save();

    return response()->json([
        "model" => $Category,
        "estatus" => 1,
        "mensaje" => "Registrado"
    ]);
}
public function updateCategory(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
    ]);

    $Category = Category::find($id);
    $Category->name = $request->name;
    $Category->update();

    return response()->json([
        "model" => $Category,
        "estatus" => 1,
        "mensaje" => "Actualizado"
    ]);
}
public function deleteCategory($id)
{
    $Category = Category::find($id)->delete();

    return response()->json([
        "model" => $Category,
        "estatus" => 1,
        "mensaje" => "Eliminado"
    ]);
}
}
