<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function getAllLanguage()
    {
        $Language = Language::All();
        return response()->json($Language);
    }

    public function getXidLanguage($language_id)
    {
        $Language = Language::find($language_id);
        return response()->json($Language);
    }

    public function createLanguage(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $Language = new Language();
        $Language->name = $request->name;
        $Language->save();
        return response()->json([
            "estatus" => 1,
            "mensaje" => "Registrado"
        ]);
    }
    public function updateLanguage(Request $request, $language_id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $Language = Language::find($language_id);
        $Language->name = $request->name;
        $Language->update();
        return response()->json([
            "Model"=>$Language,
            "estatus" => 1,
            "mensaje" => "Registrado"
        ]);
    }
    public function deleteLanguage($language_id)
    {
        $Language = Language::find($language_id)->delete();
        return response()->json([
            
            "estatus" => 1,
            "mensaje" => "Eliminado"
        ]);
    }
}