<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function indexCity()
    {
        $City = City::All();
        return response()->json($City);
    }

    public function index_idCity($id)
    {
        $City = City::find($id);
        return response()->json($City);
    }

    public function createCity(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'country_id' => 'required',
        ]);

        $City = new City();
        $City->name = $request->name;
        $City->save();

        return response()->json([
            "model" => $City,
            "estatus" => 1,
            "mensaje" => "Registrado"
        ]);
    }
    public function updateCity(Request $request, $id)
    {
        $request->validate([
            'city' => 'required',
            'country_id' => 'required',
        ]);

        $City = City::find($id);
        $City->name = $request->name;
        $City->update();

        return response()->json([
            "model" => $City,
            "estatus" => 1,
            "mensaje" => "Actualizado"
        ]);
    }
    public function deleteCity($id)
    {
        $City = City::find($id)->delete();

        return response()->json([
            "model" => $City,
            "estatus" => 1,
            "mensaje" => "Eliminado"
        ]);
    }
}
